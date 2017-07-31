<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('5.6.4', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 5.6.4 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "src/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/templates
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage
 *
 * We do this so that the Template Hierarchy will look in themes/sage/templates for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/templates
 */
if (is_customize_preview() && isset($_GET['theme'])) {
    $sage_error(__('Theme must be activated prior to using the customizer.', 'sage'));
}
add_filter('template', function ($stylesheet) {
    return dirname($stylesheet);
});
if (basename($stylesheet = get_option('template')) !== 'templates') {
    update_option('template', "{$stylesheet}/templates");
    wp_redirect($_SERVER['REQUEST_URI']);
    exit();
}

// class ext_breadcrumb_trail extends bcn_breadcrumb_trail
// {
//     //Default constructor
//     function __construct()
//     {
//         //Need to make sure we call the constructor of bcn_breadcrumb_trail
//         parent::__construct();
//     }
// }

//Allows custom taxonomy to be displayed
function display_taxonomy_terms($post_type, $display = false) {
    global $post;
    $term_list = wp_get_post_terms($post->ID, $post_type, array('fields' => 'names'));

    if($display == false) {
        echo $term_list[0];
    }elseif($display == 'return') {
        return  $term_list[0];
    }
}

//Stops wordpress from hardcoding height and widths to images in the editor
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function filter_ptags_on_images($content){ // Remove p tags from around images
     return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

}
add_filter('the_content', 'filter_ptags_on_images');

function register_my_menu() {
  register_nav_menu('magazine_nav',__( 'Magazine Navigation' ));
}
add_action( 'init', 'register_my_menu' );
