{{-- Contact form that goes on the bottom of the Great Events Spaces pages --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="content-container">
  <hr>
  <div class="event-spaces-contact">
      <div class="main-text">
        {{ the_field('event_space_notes') }}
      </p>
      <div class="contact-form">
        {{ the_field('contact_form') }}
      </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
