<?php

namespace App;

function specialties_list($atts) {
    $terms = get_terms( array(
        'post_type' => 'expert',
        'taxonomy' => 'specialties',
        'hide_empty' => true,
        'orderby' => 'name'
    ));

    $specialty_links = array_map(function($specialty) {
        return '<li><a href="'.get_term_link($specialty).'">'.$specialty->name.'</a></li>';
    }, $terms);

    $output = "<ul>";
    $output .= implode("", $specialty_links);
    $output .= "</ul>";
    return $output;
}

function museums_list($atts) {
    $terms = get_terms( array(
        'post_type' => 'expert',
        'taxonomy' => 'museums',
        'hide_empty' => true,
        'orderby' => 'name'
    ));

    $museum_links = array_map(function($museum) {
        return '<li><a href="'.get_term_link($museum).'">'.$museum->name.'</a></li>';
    }, $terms);

    $output = "<ul>";
    $output .= implode("", $museum_links);
    $output .= "</ul>";
    return $output;
}

function magazine_signup_form($atts) {
    ob_start();
    include get_template_directory() . '/templates/partials/magazine-signup-form.blade.php';
    return ob_get_clean();
}

/**
* Fixes empty <p> and <br> tags showing before and after shortcodes in the
* output content.
*/
function the_content_shortcode_fix($content) {
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
        ']<br>'   => ']'
    );
    return strtr($content, $array);
}
add_filter('the_content', 'App\\the_content_shortcode_fix');

function acf_content( $value, $post_id, $field )
{
    // run the_content filter on all textarea values
    $value = apply_filters('the_content', $value);
    return $value;
}
add_filter('acf/format_value/name=tab_copy', 'App\\acf_content', 10, 3);
add_filter('acf/format_value/name=trip_copy', 'App\\acf_content', 10, 3);

/**
 * Ignores old [media-credit] shortcodes
 */
function ignore_media_credit_shortcode($atts, $content = null) {
    return $content;
}

/**
 * Removes stray [media-credit] shortcodes from [caption] output
 * and moves ACF Media Credit output below captions.
 */
add_filter('do_shortcode_tag', function($output, $tag, $attr, $m) {
    if ('caption' == $tag || 'wp_caption' == $tag) {
        $output = preg_replace("/\[\/?media-credit[^\]]*\]/", '', $output);
        $output = preg_replace("/(<span class=\"acf-media-credit\"><span class=\"acf-credit\"><span class=\"acf-credit\">.*?<\/span><\/span><\/span>)(<figcaption .*?<\/figcaption>)/", "$2$1", $output);
    }

    return $output;
}, 10, 4);

/**
* Register shortcodes
*/
function register_shortcodes() {
    add_shortcode('specialties_list', 'App\\specialties_list');
    add_shortcode('museums_list', 'App\\museums_list');
    add_shortcode('magazine_signup_form', 'App\\magazine_signup_form');
    add_shortcode('media-credit', 'App\\ignore_media_credit_shortcode');
}
add_action('init', 'App\\register_shortcodes');

?>
