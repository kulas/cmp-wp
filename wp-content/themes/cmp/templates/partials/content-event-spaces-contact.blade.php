{{-- Contact form that goes on the bottom of the Great Events Spaces pages --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="content-container">
  <div class="event-spaces-contact">
    <hr>
      <p class="main-text">
        All rental fees include tables, chairs, custodial services, limited technical services,
        and entrance/gallery staffing (if applicable). We offer a non-profit discount, and some
        spaces are subject to multi-space rental discounts.<br />
        *(Note: Suggested capacities are based
        on standard event settings. Events that require different space arrangements may lower the
        estimated capacity.)<br />
        **Discounts are not applicable to gallery fees. Galleries subject to food and beverage restrictions.
      </p>
      <div class="contact-form">
        {{ the_field('contact_form') }}
      </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
