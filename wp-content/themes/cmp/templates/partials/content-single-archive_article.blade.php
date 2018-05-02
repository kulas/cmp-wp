@php($article_url = get_field('article_url'))
@if ($article_url)
  @php(header("Location: $article_url". false, 301))
@else
  <?php
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
  ?>
@endif
