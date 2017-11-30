{{--
  Template Name: Carnegie Magazine Current Issue
--}}
@php
  // Get latest issue
  $issue = get_posts(array(
    'post_type'      => 'issue', // set the post type to issue
    'posts_per_page' => 1, // include all issues
    'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
    'orderby'        => 'meta_value',
    'meta_key'       => 'issue_number'
  ));

  // 302 Redirect to latest issue (or magazine home if no issues found)
  $redirect_url = !empty($issue) ? get_permalink($issue[0]) : site_url('/carnegie-magazine/') ;
  header("Location: $redirect_url", true, 302);
@endphp
