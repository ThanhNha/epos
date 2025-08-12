<?php
function disable_flatsome_single_page_header()
{
    remove_action('flatsome_after_header', 'flatsome_single_page_header', 10);
}
add_action('after_setup_theme', 'disable_flatsome_single_page_header', 20);

function insert_multiple_shortcodes_in_content($content)
{
    if (is_singular('post') && is_main_query()) {

        // Shortcode [block id="newsletter-blog-detail-2"]
        $shortcode1 = '<div class="newsletter">' . do_shortcode('[block id="newsletter-blog-detail-2"]') . '</div>';

        // Shortcode [block id="cta-box"]
        $shortcode2 = '<div class="cta-box">' . do_shortcode('[block id="newsletter-blog-detail-3"]') . '</div>';

        //
        $paragraphs = explode('</p>', $content);
        if (count($paragraphs) > 1) {
            $paragraphs[0] .= '</p>' . $shortcode1;
        }
        $content = implode('</p>', $paragraphs);

        //
        preg_match_all('/<h3[^>]*>/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $h3_matches = $matches[0];
        $h3_count = count($h3_matches);

        if ($h3_count >= 2) {
            $insert_index = ceil($h3_count / 2) - 1;
            $insert_position = $h3_matches[$insert_index][1];

            $shortcode2 = '<div class="newsletter">' . do_shortcode('[block id="newsletter-blog-detail-3"]') . '</div>';

            $content = substr_replace($content, $shortcode2, $insert_position, 0);
        }
    }

    return $content;
}
add_filter('the_content', 'insert_multiple_shortcodes_in_content');
