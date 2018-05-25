{{-- Careers Template --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();
@endphp

<div class="no-header">
  <div class="content-container">
    <h1>{{ the_title() }}</h1>
    <div class="content-wrapper">
      <div class="l-full">
        {{ the_content() }}
      </div>
    </div>
    <div class="content-wrapper">
      <div class="l-full">
        {!! do_shortcode(get_field('iframe_url')) !!}
      </div>
    </div>
    @include('partials.tabs')
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
