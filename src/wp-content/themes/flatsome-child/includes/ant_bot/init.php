<?php
use Automattic\WooCommerce\Admin\Overrides\OrderRefund;

if (!defined('BOT_DEBUG')) {
  define('BOT_DEBUG', true);
}

add_action('rest_api_init', function () {
  register_rest_route('reports/v1', '/daily', [
    'methods'  => 'POST',
    'callback' => 'generate_report_wrapper',
    'permission_callback' => 'authenticate_request' // restrict access
  ]);
});

/**
 * Wrapper for the report generator
 */
function generate_report_wrapper() {
  $report = ad_collect_orders_and_build_report();

  return [
    'content' => $report
  ];
}

/**
 * Authorize request bsaed on token
 */
function authenticate_request($request) {
  $report_token = get_field('report_token', 'option');

  if (!$report_token) {
    return new WP_Error(
      'forbidden',
      'No token to compare',
      ['status' => 403]
    );
  }

  $token = $request->get_header('authorization');

  if (!$token) {
    return new WP_Error(
      'forbidden',
      'Missing token',
      ['status' => 403]
    );
  }

  $token = str_replace('Bearer ', '', $token);

  return hash_equals($report_token, $token);
}

/**
 * Check if debug mode is on
 */
function debug_on() {
  return defined('BOT_DEBUG') && BOT_DEBUG;
}

/**
 * Daily Report:
 * Send at 8:00 AM
 * Include yesterday perforamnce (00:00:00 to 23:59:59)
 * 
 * Markets: Each appears at its own section
 * - Malaysia
 * - Singapore
 * 
 * Channel aggregation rules:
 * - Show top 4 sources
 * - Other sources are grouped into "Others"
 * - Combine these into TNGD:
 *  - tngd
 *  - tngdapp
 * 
 * MTD = first day of month until yesterday 23:59:59
 * 
 * Run Rate Calculation:
 * - Expected MTD Sales = (Days Elapsed / Total Days in Month) * Monthly Target
 * - Run Rate = (Actual MTD Sales / Expected MTD Sales) * 100%
 * 
 * Example:
 *  MALAYSIA
 *  Total devices sold & paid orders: 17 | 16
 *  Channel breakdown: TNGD (7), Direct (4), googlesem,googleadwords (3), Google (1), Others (2)
 *  MTD devices sold: 200 (35% of 565 target)
 *  MTD run rate: 110%
 */
function ad_collect_orders_and_build_report() {
  $tz = wp_timezone();

  $first_day_of_month = new DateTime('first day of this month 00:00:00', $tz);
  $start_yesterday    = new DateTime('yesterday 00:00:00', $tz);
  $end_yesterday      = new DateTime('yesterday 23:59:59', $tz);

  if (debug_on()) {
    $first_day_of_month = new DateTime('2026-03-01 00:00:00', $tz);
    $start_yesterday    = new DateTime('2026-03-05 00:00:00', $tz);
    $end_yesterday      = new DateTime('2026-03-05 23:59:59', $tz);
  }

  // Fetch all orders covering the widest range to minimize database calls
  $orders = wc_get_orders(array(
    'limit'        => -1,
    'status'       => array('wc-processing', 'wc-completed'),
    'date_created' => $first_day_of_month->getTimestamp() . '...' . $end_yesterday->getTimestamp(),
  ));

  $total_orders_since_first_of_month = [];
  $total_orders_yesterday = [];

  foreach ($orders as $order) {
    if ($order instanceof OrderRefund || $order->has_status('refunded')) {
      continue;
    }
    $order_ts = $order->get_date_created()->getTimestamp();

    if ($order_ts >= $first_day_of_month->getTimestamp() && $order_ts <= $end_yesterday->getTimestamp()) {
      $total_orders_since_first_of_month[] = $order;
    }

    if ($order_ts >= $start_yesterday->getTimestamp() && $order_ts <= $end_yesterday->getTimestamp()) {
      $total_orders_yesterday[] = $order;
    }
  }

  // Generate Markdown content
  $message = build_daily_report($total_orders_yesterday, $total_orders_since_first_of_month);
 
  return $message;
}

/**
 * Example:
 *  Total devices sold & paid orders: 17 | 16
 */
function collect_total_devices_and_orders($orders) {
  $total_orders = count($orders);
  $total_devices = 0;

  foreach ($orders as $order) {
    $qty = $order->get_item_count();
    $total_devices += $qty;
  }

  return "- Total devices sold & paid orders: $total_devices | $total_orders<br>";
}

/**
 * Channel aggregation rules:
 * - Show top 4 sources
 * - Other sources are grouped into "Others"
 * - Combine these into TNGD:
 *  - tngd
 *  - tngdapp
 * 
 * Example:
 *  Channel breakdown: TNGD (7), Direct (4), googlesem,googleadwords (3), Google (1), Others (2)
 */
function collect_and_combine_channels($orders) {
  $channels = [];
  $tngd_sources = ['tngd', 'tngdapp'];

  // Collect and categorize channels
  foreach ($orders as $order) {
    $source = $order->get_meta('_wc_order_attribution_utm_source');
    $source = (!$source || $source === '(direct)') ? 'Direct' : $source;
    // Combine tngd and tndgapp into one channel
    if (in_array($source, $tngd_sources)) {
      $source = 'TNGD';
    }
    $channels[$source] = ($channels[$source] ?? 0) + $order->get_item_count();
  }
  arsort($channels);

  // Group channels beyond top 5 into "Others"
  $compound_channels = [];
  $counter = 0;
  foreach ($channels as $name => $count) {
    $counter++;
    if ($counter < 5) {
      $compound_channels[$name] = $count;
    } else {
      $compound_channels['Others'] = ($compound_channels['Others'] ?? 0) + $count;
    }
  }

  // Build string
  $channel_breakdown = "- Channel breakdown:";
  foreach ($compound_channels as $name => $count) {
    $channel_breakdown .= " $name ($count),";
  }
  $channel_breakdown = rtrim($channel_breakdown, ',');

  return $channel_breakdown . "<br>";
}

/**
 * Only possitive integer is allowed
 */
function is_monthly_target_valid($monthly_target) {
  return is_int($monthly_target) && $monthly_target > 0;
}

/**
 * MTD = first day of month until yesterday 23:59:59
 * 
 * Example:
 *  MTD devices sold: 200 (35% of 565 target)
 */
function calculate_mtd_sold_and_run_rate($orders) {
  // Monthly Target
  $monthly_target = get_field('monthly_target', 'option') ?: 565;
  $monthly_target = (int)$monthly_target;
  // MTD
  $total_devices = 0;

  foreach ($orders as $order) {
    $qty = $order->get_item_count();
    $total_devices += $qty;
  }

  $mtd_devices_sold = "- MTD devices sold: $total_devices";

  if (is_monthly_target_valid($monthly_target)) {
    $percentage = round(($total_devices / $monthly_target) * 100, 2);
    if ($percentage == 0) {
      $percentage = "less than 1";
    }
    $mtd_devices_sold .= " ($percentage% of $monthly_target target)";
  }

  $mtd_devices_sold .= "<br>";

  $run_rate = calculate_run_rate($total_devices, $monthly_target);
  $mtd_devices_sold .= $run_rate; 

  return $mtd_devices_sold;
}

/**
 * Run Rate Calculation:
 * - Run Rate = (Actual MTD Sales / Expected MTD Sales) * 100%
 * 
 * Notations:
 *  - Actual MTD Sales = devices sold from 1st of month -> yesterday
 *  - Expected MTD Sales = (Days Elapsed / Total Days in Month) * Monthly Target
 *   - Days Elapsed = number of days passed in the current month + today
 * 
 * Example:
 *  MTD run rate: 110%
 */
function calculate_run_rate($actual_mtd_sales, $monthly_target) {
  if (!is_monthly_target_valid($monthly_target)) {
    return "- MTD run rate: N/A (Monthly Rate was not set)<br>";
  }

  $tz = wp_timezone();
  $today = new DateTime('now', $tz);
  if (debug_on()) {
    $today = new DateTime('2026-03-06 00:00:00', $tz);
  }
  // Days Elapsed
  $days_elapsed = (int)$today->format('j');
  // if today is the first day of the new month
  // then Days Elapsed must exclude today
  if ($days_elapsed == 1) {
    $today = new DateTime('yesterday 00:00:00', $tz);
    $days_elapsed = (int)$today->format('j');
  }
  // Total Days in Month
  $total_days_in_month = (int)$today->format('t');

  // Expected MTD Sales
  $expected_mtd_sales = ($days_elapsed / $total_days_in_month) * $monthly_target;
  // Run Rate
  $run_rate = round(($actual_mtd_sales / $expected_mtd_sales) * 100, 2);

  if ($run_rate == 0) {
    $run_rate = "less than 1";
  }

  return "- MTD run rate: $run_rate%<br>";
}

/**
 * Example:
 *  MALAYSIA
 *  Total devices sold & paid orders: 17 | 16
 *  Channel breakdown: TNGD (7), Direct (4), googlesem,googleadwords (3), Google (1), Others (2)
 *  MTD devices sold: 200 (35% of 565 target)
 *  MTD run rate: 110%
 */
function build_daily_report($total_orders_yesterday, $total_orders_since_first_of_month) {
  $output = "**SINGAPORE**<br>";
  // Total devices sold & paid orders: 17 | 16
  $output .= collect_total_devices_and_orders($total_orders_yesterday);
  // Channel breakdown: TNGD (7), Direct (4), googlesem,googleadwords (3), Google (1), Others (2)
  $output .= collect_and_combine_channels($total_orders_yesterday);
  // MTD devices sold: 200 (35% of 565 target)
  // MTD run rate: 110%
  $output .= calculate_mtd_sold_and_run_rate($total_orders_since_first_of_month);

  return $output;
}
