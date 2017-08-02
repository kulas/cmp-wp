{{-- Great Event Spaces gallery with hover-over description --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="event-spaces-gallery">
  <div class="content-container">
      <div class="spaces">

        @php
          if( have_rows('event_space') ): // Loops through Event Space custom field repeater
          while ( have_rows('event_space') ) :
          the_row();
        @endphp

          <div class="event-space">
            <a class="event-space__image-container" style="background-image:url('{{ the_sub_field('image') }}')" href="">
              <div class="event-space__description">
                {{ the_sub_field('detailed_description') }}
              </div>
            </a>
            <h2>{{ the_sub_field('name') }}</h2>
          </div>

        @php
          endwhile; else : endif;
        @endphp

    </div>
  </div>
</div>

@php
  endwhile; else : endif;
@endphp
