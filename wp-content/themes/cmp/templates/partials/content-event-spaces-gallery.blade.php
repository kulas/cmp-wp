{{-- Great Event Spaces image gallery --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="event-spaces-gallery">
  <div class="content-container">
    <div class="nav-breadcrumb">

      @php
        if(function_exists('bcn_display')) // The breadcrumb plugin.
          {
              bcn_display();
          }
      @endphp

    </div>
      <div class="spaces">

        @php
          if( have_rows('event_space') ): // Loops through Event Space custom fields repeater.
          while ( have_rows('event_space') ) :
          the_row();
        @endphp

          <div class="event-space">
            <div class="event-space__image-container">
              <img src="{{ the_sub_field('image') }}" alt="{{ the_sub_field('image_alt') }}"/>
            </div>
            <h2>{{ the_sub_field('name') }}</h2>
          </div>

        @php
          endwhile; else : endif;
        @endphp

      </div>
    </div>
  </div>

@php
  endwhile; else: endif;
@endphp
