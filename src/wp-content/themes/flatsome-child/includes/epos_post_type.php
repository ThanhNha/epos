<?php
function create_careers_post_type()
{
    $labels = array(
        'name'                  => _x('Careers', 'Post Type General Name', 'textdomain'),
        'singular_name'         => _x('Career', 'Post Type Singular Name', 'textdomain'),
        'menu_name'             => __('Careers', 'textdomain'),
        'name_admin_bar'        => __('Career', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Career', 'textdomain'),
        'edit_item'             => __('Edit Career', 'textdomain'),
        'new_item'              => __('New Career', 'textdomain'),
        'view_item'             => __('View Career', 'textdomain'),
        'view_items'            => __('View Careers', 'textdomain'),
        'search_items'          => __('Search Career', 'textdomain'),
        'not_found'             => __('No careers found', 'textdomain'),
        'not_found_in_trash'    => __('No careers found in Trash', 'textdomain'),
        'all_items'             => __('All Careers', 'textdomain'),
    );

    $args = array(
        'label'                 => __('Careers', 'textdomain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-businessperson',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array('slug' => 'careers'),
        'capability_type'       => 'post',
        'show_in_rest'          => true
    );

    register_post_type('careers', $args);
}
add_action('init', 'create_careers_post_type');

function create_careers_taxonomy()
{
    $labels = array(
        'name'              => _x('Departments', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Department', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Department', 'textdomain'),
        'all_items'         => __('All Departments', 'textdomain'),
        'parent_item'       => __('Parent Department', 'textdomain'),
        'parent_item_colon' => __('Parent Department:', 'textdomain'),
        'edit_item'         => __('Edit Department', 'textdomain'),
        'update_item'       => __('Update Department', 'textdomain'),
        'add_new_item'      => __('Add New Department', 'textdomain'),
        'new_item_name'     => __('New Department Name', 'textdomain'),
        'menu_name'         => __('Departments', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'department'),
        'show_in_rest'      => true
    );

    register_taxonomy('department', array('careers'), $args);
}
add_action('init', 'create_careers_taxonomy');


add_action('department_add_form_fields', function () {
?>
    <div class="form-field term-group">
        <label for="department_image"><?php _e('Department Image', 'textdomain'); ?></label>
        <input type="hidden" id="department_image" name="department_image" value="">
        <div id="department_image_preview" style="margin-top:10px;"></div>
        <button type="button" class="button button-secondary" id="department_image_upload"><?php _e('Upload Image', 'textdomain'); ?></button>
        <button type="button" class="button button-secondary" id="department_image_remove" style="display:none;"><?php _e('Remove Image', 'textdomain'); ?></button>
    </div>
<?php
});

add_action('department_edit_form_fields', function ($term) {
    $image_id = get_term_meta($term->term_id, 'department_image', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="department_image"><?php _e('Department Image', 'textdomain'); ?></label></th>
        <td>
            <input type="hidden" id="department_image" name="department_image" value="<?php echo esc_attr($image_id); ?>">
            <div id="department_image_preview" style="margin-top:10px;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width:150px;">
                <?php endif; ?>
            </div>
            <button type="button" class="button button-secondary" id="department_image_upload"><?php _e('Upload Image', 'textdomain'); ?></button>
            <button type="button" class="button button-secondary" id="department_image_remove" <?php if (!$image_url) echo 'style="display:none;"'; ?>><?php _e('Remove Image', 'textdomain'); ?></button>
        </td>
    </tr>
    <?php
});

add_action('created_department', 'save_department_image');
add_action('edited_department', 'save_department_image');
function save_department_image($term_id)
{
    if (isset($_POST['department_image']) && $_POST['department_image'] !== '') {
        update_term_meta($term_id, 'department_image', intval($_POST['department_image']));
    } else {
        delete_term_meta($term_id, 'department_image');
    }
}


add_action('admin_enqueue_scripts', function () {
    $screen = get_current_screen();

    if ($screen && $screen->taxonomy === 'department') {
        wp_enqueue_script('jquery');
        wp_enqueue_media();
        $js = "
            jQuery(document).ready(function($) {
                var mediaUploader;

                $('#department_image_upload').on('click', function(e) {
                    e.preventDefault();
                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }
                    mediaUploader = wp.media({
                        title: '".esc_js(__('Select or Upload Image', 'textdomain'))."',
                        button: { text: '".esc_js(__('Use this image', 'textdomain'))."' },
                        multiple: false
                    });
                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        $('#department_image').val(attachment.id);
                        $('#department_image_preview').html('<img src=\"' + attachment.url + '\" style=\"max-width:150px;\">');
                        $('#department_image_remove').show();
                    });
                    mediaUploader.open();
                });

                $('#department_image_remove').on('click', function(e) {
                    e.preventDefault();
                    $('#department_image').val('');
                    $('#department_image_preview').html('');
                    $(this).hide();
                });
            });
        ";

        wp_add_inline_script('jquery', $js);
    }
});
