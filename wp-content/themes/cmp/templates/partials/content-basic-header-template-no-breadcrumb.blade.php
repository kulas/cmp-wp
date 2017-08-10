{{-- Basic page template with custom header field, no breadcrumb --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

@php
  $image = get_field('header_image');
  $image_id = $image['id'];
  $image_url = $image['url'];
  $image_credit = get_media_credit_html($image_id);
@endphp

<div class="basic-header">
  <div class="hero-header" style="background-image:url('{{ $image_url }}')">
    <p class="media-credit">{{ $image_credit }}</p>
  </div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
    <div class="main-text">
      {{ the_content() }}
    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
