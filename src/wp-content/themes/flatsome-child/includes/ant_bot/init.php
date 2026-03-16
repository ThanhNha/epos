<?php
use Automattic\WooCommerce\Admin\Overrides\OrderRefund;
require_once __DIR__ . '/AntBotReportGenerator.php';

/**
 * Register rest route
 */
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
 * Generate report
 */
function ad_collect_orders_and_build_report() {
  $report_generator = new AntBotReportGenerator('SINGAPORE');
  $report_generator->set_origin_sg();
  // $report_generator->turn_debug_mode_on();
  // $report_generator->turn_print_on();
  $report_generator->set_debug_date('2026-03-14 00:00:00');
  
  $message = $report_generator->generate_report();
 
  return $message;
}
