{{-- Single event page --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="basic-header single-event">
  <div class="content-container">
    <h2>{{ get_the_title() }}</h2>
    <div class="event-container">
      <div class="event__description">
        {{ the_content() }}
      </div>
      <div class="event__image">
        {{ the_post_thumbnail() }}
      </div>
    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
