{{-- Single event page --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="no-header single-event">
  <div class="content-container">
    <div class="content-wrapper">
      <div class="l-long">
        <h2>{{ get_the_title() }}</h2>
        {{ the_content() }}
      </div>
      <div class="l-short">
        {{ the_post_thumbnail() }}
      </div>
    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
