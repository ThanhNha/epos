<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';


/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
function exclude_category_home( $query ) {
    if ( $query->is_home ) {
        $query->set( 'cat', '-127' );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'exclude_category_home' );


// Disable XML-RPC in WordPress   
add_filter('xmlrpc_enabled', '__return_false');


//<!-- ---####*** Add content in Header ***####--- --> 
function myContentHeader() {
    ?>
        <link href="<?php echo get_template_directory_uri(); ?>/assets/css/roboto.css" rel="stylesheet">
    <?php
}
add_action( 'wp_head', 'myContentHeader' );
