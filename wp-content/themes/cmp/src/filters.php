<?php

namespace App;
use The_SEO_Framework;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    // Add class if sidebar is active
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    return $classes;
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
array_map(function ($type) {
    add_filter("{$type}_template_hierarchy", function ($templates) {
        return call_user_func_array('array_merge', array_map(function ($template) {
            $transforms = [
                '%^/?(templates)?/?%' => config('sage.disable_option_hack') ? 'templates/' : '',
                '%(\.blade)?(\.php)?$%' => ''
            ];
            $normalizedTemplate = preg_replace(array_keys($transforms), array_values($transforms), $template);
            return ["{$normalizedTemplate}.blade.php", "{$normalizedTemplate}.php"];
        }, $templates));
    });
}, [
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
]);

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = array_reduce(get_body_class(), function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    echo template($template, $data);

    // Return a blank file to make WordPress happy
    return get_theme_file_path('index.php');
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', 'App\\template_path');

/**
 * Customize og:image meta value with The SEO Framework plugin
 */
add_filter('the_seo_framework_og_image_args', function($args) {
    if (is_numeric($args['post_id'])):
        $id = $args['post_id'];

        // try the SEO Framework image override for this post
        if (empty($args['image']) && !empty($url = get_post_meta($id, '_social_image_url', true))):
            $args['image'] = $url;
        endif;

        // try featured image
        if (empty($args['image']) && has_post_thumbnail()):
            $args['image'] = get_the_post_thumbnail_url($id, 'large');
        endif;

        // try header image
        if (empty($args['image']) && !empty($image = get_field('header_image', $id))):
            $args['image'] = $image['sizes']['large'];
        endif;

        // try featured image custom field (e.g. on Face Time posts)
        if (empty($args['image']) && !empty($image = get_field('featured_image', $id))):
            $args['image'] = $image['sizes']['large'];
        endif;
    endif;

    return $args;
});

// REST API: Allow orderby meta_value on issue posts
// https://github.com/WP-API/WP-API/issues/2308#issuecomment-266214066
add_filter('rest_endpoints', function ($routes) {
    foreach (array('issue') as $type) {
      if (!($route =& $routes['/wp/v2/' . $type])) {
        continue;
      }

      // Allow ordering by meta values
      $route[0]['args']['orderby']['enum'][] = 'meta_value';

      // Allow only specific meta keys
      $route[0]['args']['meta_key'] = array(
          'description'       => 'The meta key to query.',
          'type'              => 'string',
          'enum'              => ['issue_number'],
          'validate_callback' => 'rest_validate_request_arg',
      );
    }

    return $routes;
  }, 10, 1);

// Manipulate query
add_filter('rest_issue_query', function ($args, $request) {
    $orderby = $request->get_param('orderby');
    if (!empty($orderby) && $orderby === 'meta_value') {
        $meta_key = $request->get_param('meta_key');
        if (!empty($meta_key) && $meta_key === 'issue_number') {
            $args['meta_key'] = $meta_key;
        }
    }

    return $args;
}, 10, 2);
