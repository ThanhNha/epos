<?php
function disable_flatsome_single_page_header()
{
    remove_action('flatsome_after_header', 'flatsome_single_page_header', 10);
}
add_action('after_setup_theme', 'disable_flatsome_single_page_header', 20);

function insert_multiple_shortcodes_in_content($content)
{
    if (is_singular('post') && is_main_query()) {

        // Shortcode [cta_block_1]
        $shortcode1 = '<div class="newsletter">' . do_shortcode('[cta_block_1]') . '</div>';

        // Shortcode [cta_block_2]
        $shortcode2 = '<div class="newsletter">' . do_shortcode('[cta_block_2]') . '</div>';

        // Shortcode [cta_block_3]
        $shortcode3 = '<div class="newsletter">' . do_shortcode('[cta_block_3]') . '</div>';

        $paragraphs = explode('</p>', $content);
        if (count($paragraphs) > 1) {
            $paragraphs[0] .= '</p>' . $shortcode1;
        }
        $content = implode('</p>', $paragraphs);

        preg_match_all('/<h3[^>]*>/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $h3_matches = $matches[0];
        $h3_count = count($h3_matches);

        if ($h3_count >= 2) {
            $insert_index = ceil($h3_count / 2) - 1;
            $insert_position = $h3_matches[$insert_index][1];
            $content = substr_replace($content, $shortcode2, $insert_position, 0);
        }
        $content .= $shortcode3;
    }

    return $content;
}
add_filter('the_content', 'insert_multiple_shortcodes_in_content');




// Shortcode CTA Block 1
function cta_block_1_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'id' => '1',
        ),
        $atts,
        'cta_block_1'
    );

    $post_id = get_the_ID();

    $title       = get_field('title_cta_block_1', $post_id);
    $description = get_field('description_cta_block_1', $post_id);
    $image       = get_field('image_cta_block_1', $post_id);
    $buttons     = get_field('button_cta_block_1', $post_id);
    $hubspot_form_block = get_field('hubspot_form_block_1', $post_id);
    $newletter_form = ($hubspot_form_block === "eaf3aa0c-e123-4f54-ac18-5388ad1bbbb9");
    var_dump($image);

    if (!$title && !$description && !$image && !$buttons && !$hubspot_form_block) {
        return '';
    }

    ob_start(); ?>

    <div class="container section cta-block cta-block-1">
        <div class="row">

            <?php if ($newletter_form): ?>
                <div class="col medium-12 small-12 col-content newletter-box bg-green-light">
                    <?php if ($title): ?>
                        <p class="cta-title"><?php echo ($title); ?></p>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="cta-description"><?php echo ($description); ?></p>
                    <?php endif; ?>
                    <div class="hubspot-form">
                        <?php echo do_shortcode('[hubspot type="form" portal="2578781" id="' . esc_attr($hubspot_form_block) . '"]'); ?>
                    </div>
                    <?php if ($buttons): ?>
                        <div class="button-group">
                            <?php foreach ($buttons as $index => $btn): ?>
                                <?php
                                $btn_class = "button secondary lowercase rounded-1";
                                if ($index == 1) {
                                    $btn_class = "button primary is-outline lowercase rounded-1 outline";
                                }
                                ?>
                                <a href="<?php echo esc_url($btn['button']['url']); ?>"
                                    class="<?php echo esc_attr($btn_class); ?>"
                                    style="margin-right:10px;">
                                    <?php echo ($btn['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else: ?>
                <?php $has_side_block = ($image && $hubspot_form_block == 'none') || ($hubspot_form_block && $hubspot_form_block != 'none' && empty($image)); ?>
                <div class="col medium-<?php echo $has_side_block ? '6' : '12'; ?> small-12 col-content newletter-box bg-green-light">
                    <?php if ($title): ?>
                        <p class="cta-title"><?php echo ($title); ?></p>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="cta-description"><?php echo ($description); ?></p>
                    <?php endif; ?>

                    <?php if ($buttons): ?>
                        <div class="button-group">
                            <?php foreach ($buttons as $index => $btn): ?>
                                <?php
                                $btn_class = "button secondary lowercase rounded-1";
                                if ($index == 1) {
                                    $btn_class = "button primary is-outline lowercase rounded-1 outline";
                                }
                                ?>
                                <a href="<?php echo esc_url($btn['button']['url']); ?>"
                                    class="<?php echo esc_attr($btn_class); ?>"
                                    style="margin-right:10px;">
                                    <?php echo ($btn['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($image && $hubspot_form_block == 'none'): ?>
                    <div class="col medium-6 small-12 col-image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                <?php elseif ($hubspot_form_block && $hubspot_form_block != 'none' && empty($image)): ?>
                    <div class="col medium-6 small-12 col-form">
                        <div class="hubspot-form">
                            <?php echo do_shortcode('[hubspot type="form" portal="2578781" id="' . esc_attr($hubspot_form_block) . '"]'); ?>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('cta_block_1', 'cta_block_1_shortcode');


// Shortcode CTA Block 2

function cta_block_shortcode_2($atts)
{
    $atts = shortcode_atts(
        array(
            'id' => '1',
        ),
        $atts,
        'cta_block'
    );

    $post_id  = get_the_ID();

    $title       = get_field('title_cta_block_2', $post_id);
    $description = get_field('description_cta_block_2', $post_id);
    $image       = get_field('image_cta_block_2', $post_id);
    $buttons     = get_field('button_cta_block_2', $post_id);
    $hubspot_form_block = get_field('hubspot_form_block_2', $post_id);

    $newletter_form = ($hubspot_form_block === "eaf3aa0c-e123-4f54-ac18-5388ad1bbbb9");

    if (!$title && !$description && !$image && !$buttons && !$hubspot_form_block) {
        return '';
    }

    ob_start(); ?>

    <div class="container section cta-block cta-block-2">
        <div class="row">

            <?php if ($newletter_form): ?>
                <div class="col medium-12 small-12 col-content">
                    <?php if ($title): ?>
                        <p class="cta-title"><?php echo ($title); ?></p>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="cta-description"><?php echo ($description); ?></p>
                    <?php endif; ?>
                    <div class="hubspot-form">
                        <?php echo do_shortcode('[hubspot type="form" portal="2578781" id="' . esc_attr($hubspot_form_block) . '"]'); ?>
                    </div>
                    <?php if ($buttons): ?>
                        <div class="button-group">
                            <?php foreach ($buttons as $index => $btn): ?>
                                <?php
                                $btn_class = "button secondary lowercase rounded-1";
                                if ($index == 1) {
                                    $btn_class = "button primary is-outline lowercase rounded-1 outline";
                                }
                                ?>
                                <a href="<?php echo esc_url($btn['button']['url']); ?>"
                                    class="<?php echo esc_attr($btn_class); ?>"
                                    style="margin-right:10px;">
                                    <?php echo ($btn['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else: ?>
                <?php $has_side_block = ($image && $hubspot_form_block == 'none') || ($hubspot_form_block && $hubspot_form_block != 'none' && empty($image)); ?>
                <div class="col medium-<?php echo $has_side_block ? '6' : '12'; ?> small-12 col-content">

                    <?php if ($title): ?>
                        <p class="cta-title"><?php echo ($title); ?></p>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="cta-description"><?php echo ($description); ?></p>
                    <?php endif; ?>

                    <?php if ($buttons): ?>
                        <div class="button-group">
                            <?php foreach ($buttons as $index => $btn): ?>
                                <?php
                                $btn_class = "button secondary lowercase rounded-1";
                                if ($index == 1) {
                                    $btn_class = "button primary is-outline lowercase rounded-1 outline";
                                }
                                ?>
                                <a href="<?php echo esc_url($btn['button']['url']); ?>"
                                    class="<?php echo esc_attr($btn_class); ?>"
                                    style="margin-right:10px;">
                                    <?php echo ($btn['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($image && $hubspot_form_block == 'none'): ?>
                    <div class="col medium-6 small-12 col-image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                <?php elseif ($hubspot_form_block && $hubspot_form_block != 'none' && empty($image)): ?>
                    <div class="col medium-6 small-12 col-form">
                        <div class="hubspot-form">
                            <?php echo do_shortcode('[hubspot type="form" portal="2578781" id="' . esc_attr($hubspot_form_block) . '"]'); ?>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('cta_block_2', 'cta_block_shortcode_2');


// Shortcode CTA Block 3
function cta_block_shortcode_3($atts)
{
    $atts = shortcode_atts(
        array(
            'id' => '1',
        ),
        $atts,
        'cta_block_3'
    );

    $post_id  = get_the_ID();

    $title       = get_field('title_cta_block_3', $post_id);
    $description = get_field('description_cta_block_3', $post_id);
    $buttons     = get_field('button_cta_block_3', $post_id);
    $image       = get_field('image_cta_block_3', $post_id);
    $hubspot_form_block = get_field('hubspot_form_block_3', $post_id);
    $newletter_form = ($hubspot_form_block === "eaf3aa0c-e123-4f54-ac18-5388ad1bbbb9");

    if (!$title && !$description && !$image && !$buttons && !$hubspot_form_block) {
        return '';
    }

    ob_start(); ?>

    <div id="blog-form" class="container section cta-block cta-block-3">
        <div class="row">

            <?php if ($newletter_form): ?>
                <div class="col medium-12 small-12 col-content">
                    <?php if ($title): ?>
                        <p class="cta-title"><?php echo ($title); ?></p>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="cta-description"><?php echo ($description); ?></p>
                    <?php endif; ?>

                    <?php if ($buttons): ?>
                        <div class="button-group">
                            <?php foreach ($buttons as $index => $btn): ?>
                                <?php
                                $btn_class = "button secondary lowercase rounded-1";
                                if ($index == 1) {
                                    $btn_class = "button primary is-outline lowercase rounded-1 outline";
                                }
                                ?>
                                <a href="<?php echo esc_url($btn['button']['url']); ?>"
                                    class="<?php echo esc_attr($btn_class); ?>"
                                    style="margin-right:10px;">
                                    <?php echo ($btn['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="hubspot-form">
                        <?php echo do_shortcode('[hubspot type="form" portal="2578781" id="' . esc_attr($hubspot_form_block) . '"]'); ?>
                    </div>
                </div>

            <?php else: ?>
                <?php $has_side_block = ($image && $hubspot_form_block == 'none') || ($hubspot_form_block && $hubspot_form_block != 'none' && empty($image)); ?>
                <div class="col medium-<?php echo $has_side_block ? '6' : '12'; ?> small-12 col-content">
                    <?php if ($title): ?>
                        <p class="cta-title"><?php echo ($title); ?></p>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p class="cta-description"><?php echo ($description); ?></p>
                    <?php endif; ?>

                    <?php if ($buttons): ?>
                        <div class="button-group">
                            <?php foreach ($buttons as $index => $btn): ?>
                                <?php
                                $btn_class = "button secondary lowercase rounded-1";
                                if ($index == 1) {
                                    $btn_class = "button primary is-outline lowercase rounded-1 outline";
                                }
                                ?>
                                <a href="<?php echo esc_url($btn['button']['url']); ?>"
                                    class="<?php echo esc_attr($btn_class); ?>"
                                    style="margin-right:10px;">
                                    <?php echo ($btn['button']['title']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($image && $hubspot_form_block == 'none'): ?>
                    <div class="col medium-6 small-12 col-image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                <?php elseif ($hubspot_form_block && $hubspot_form_block != 'none' && empty($image)): ?>
                    <div class="col medium-6 small-12 col-form ">
                        <?php echo do_shortcode('[hubspot type="form" portal="2578781" id="' . esc_attr($hubspot_form_block) . '"]'); ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        </div>
    </div>

<?php
    return ob_get_clean();
}
add_shortcode('cta_block_3', 'cta_block_shortcode_3');




function my_custom_rp4wp_thumbnail_size($size)
{
    return 'full';
}
add_filter('rp4wp_thumbnail_size', 'my_custom_rp4wp_thumbnail_size');
