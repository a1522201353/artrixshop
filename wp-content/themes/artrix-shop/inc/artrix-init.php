<?php
function suma_remove_wp_version($src)
{
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (isset($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'suma_remove_wp_version');
add_filter('style_loader_src', 'suma_remove_wp_version');

function suma_remove_mete_version()
{
    return '';
}
add_filter('the_generator', 'suma_remove_mete_version');


function remove_dashboard_widget()
{
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');

add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});


function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $new_filetypes['svgz'] = 'image/svg+xml';
    $new_filetypes['webp'] = 'image/webp';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

add_filter('big_image_size_threshold', '__return_false');


function suma_svgs_upload_check($checked, $file, $filename, $mimes)
{
    if (! $checked['type']) {
        $check_filetype        = wp_check_filetype($filename, $mimes);
        $ext                = $check_filetype['ext'];
        $type                = $check_filetype['type'];
        $proper_filename    = $filename;

        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }
        $checked = compact('ext', 'type', 'proper_filename');
    }

    return $checked;
}
add_filter('wp_check_filetype_and_ext', 'suma_svgs_upload_check', 10, 4);


function get_page_by_template($template = '')
{
    $args = array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template
    );
    return get_pages($args);
}

function allow_nbsp_in_tinymce($mce_init)
{
    $mce_init['entities'] = '160,nbsp,38,amp,60,lt,62,gt';
    $mce_init['entity_encoding'] = 'named';
    return $mce_init;
}
add_filter('tiny_mce_before_init', 'allow_nbsp_in_tinymce');
