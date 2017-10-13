{{-- Great Event Spaces image gallery --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="event-spaces-gallery">
  <div class="content-container">
    <div class="breadcrumb-container">
      <div class="nav-breadcrumb">

      @php
        if(function_exists('bcn_display')) // The breadcrumb plugin.
          {
              bcn_display();
          }
      @endphp

      </div>
    </div>

    <div class="content">
      {{ the_content() }}
    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
