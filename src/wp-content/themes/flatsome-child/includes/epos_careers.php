<?php
function job_openings_shortcode()
{
    ob_start();
    $jobs_api = get_workable_jobs_epos();
    $locations_api = get_workable_location_epos();
    $jobs = [];
    $employment_types = [];

    if (!empty($jobs_api)) {
        foreach ($jobs_api as $item) {
            $location = strtolower($item['country'] ?? '');
            $employment_type = strtolower($item['employment_type'] ?? 'full-time');

            $jobs[] = [
                'title'      => $item['title'] ?? '',
                'posted'     => $item['created_at'] ?? '',
                'type'       => $item['workplace_type'] ?? 'on-site',
                'location'   => $location,
                'department' => strtolower($item['department'] ?? ''),
                'company'    => $item['account_name'] ?? 'EPOS',
                'work'       => $employment_type,
                'url'        => $item['url'] ?? '',
                'application_url' => $item['application_url'] ?? '',
                'shortlink'  => $item['shortlink'] ?? ''
            ];

            if (!empty($employment_type)) {
                $employment_types[] = ucfirst(str_replace('-', ' ', $employment_type));
            }
        }
    }

    $employment_types = array_unique($employment_types);
    sort($employment_types);
?>

    <div class="job-openings-wrapper">
        <input type="text" id="job-search" placeholder="Search jobs..." class="job-search-full" />

        <div class="job-filters">
            <!-- Location dropdown -->
            <div class="custom-select" id="location-filter">
                <div class="select-btn">
                    <span class="btn-text">Location</span>
                    <span class="arrow-dwn"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <ul class="list-items">
                    <?php if (!empty($locations_api)): ?>
                        <?php foreach ($locations_api as $loc): ?>
                            <li class="item">
                                <span class="checkbox"><i class="fa-solid fa-check check-icon"></i></span>
                                <span class="item-text" data-value="<?php echo esc_attr(strtolower($loc['name'])); ?>">
                                    <?php echo esc_html($loc['name']); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="item disabled"><span class="item-text">No locations found</span></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Work Type dropdown -->
            <div class="custom-select" id="work-filter">
                <div class="select-btn">
                    <span class="btn-text">Work Type</span>
                    <span class="arrow-dwn"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <ul class="list-items">
                    <?php if (!empty($employment_types)): ?>
                        <?php foreach ($employment_types as $type): ?>
                            <li class="item">
                                <span class="checkbox"><i class="fa-solid fa-check check-icon"></i></span>
                                <span class="item-text" data-value="<?php echo esc_attr(strtolower(str_replace(' ', '-', $type))); ?>">
                                    <?php echo esc_html($type); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="item disabled"><span class="item-text">No work types found</span></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="label-search-group" style="display: none;">
            <div class="show-tags-choised"></div>
            <button id="clear-filters"><i class="fa-solid fa-rotate-right"></i> Clear Filters</button>
        </div>

        <div class="job-list" id="job-list">
            <?php foreach ($jobs as $job): ?>
                <?php
                $date_string = $job['posted'];
                $timestamp = strtotime($date_string);
                $current = current_time('timestamp');
                $diff = human_time_diff($timestamp, $current) . ' ago';
                ?>
                <div class="job-item"
                    data-location="<?php echo esc_attr($job['location']); ?>"
                    data-department="<?php echo esc_attr($job['department']); ?>"
                    data-work="<?php echo esc_attr($job['work']); ?>">
                    <a href="<?php echo esc_url($job['url']); ?>">
                        <div class="job-name-wrapper">
                            <h3 class="job-name"><a href="<?php echo esc_url($job['url']); ?>"><?php echo esc_html($job['title']); ?></a></h3>
                            <div class="job-meta">
                                <span class="job-posted">Posted <?php echo esc_html($diff); ?></span>
                            </div>
                        </div>
                        <div class="job-type-wrapper"><span class="job-type"><?php echo ucfirst($job['type']); ?></span></div>
                        <div class="job-location-wrapper"><span class="job-location"><?php echo ucfirst($job['location']); ?></span></div>
                        <div class="job-department-wrapper"><span class="job-department"><?php echo ucfirst($job['department']); ?></span></div>
                        <div class="job-work-wrapper"><span class="job-work"><?php echo ucfirst(str_replace('-', ' ', $job['work'])); ?></span></div>
                    </a>
                </div>
            <?php endforeach; ?>

            <div class="job-loading-overlay" id="job-loading" style="display: none;">
                <div class="job-loading-inner">
                    <img src="/wp-content/uploads/2025/05/EPOS_Logo_2-3.png" alt="Loading..." class="loading-logo">
                </div>
            </div>
        </div>
        <div id="no-jobs" style="display: none; text-align:center; padding: 40px 0; font-size: 16px; color: #666;">
            No jobs found matching your criteria.
        </div>
        <div class="load-more-wrapper" style="text-align: center; margin-top: 20px;">
            <button id="load-more" class="load-more-btn">Load More</button>
        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('job_openings', 'job_openings_shortcode');
