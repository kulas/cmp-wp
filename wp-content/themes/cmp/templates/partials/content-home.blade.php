{{-- Doesn't look like anything to me. --}}
@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

{{ the_content() }}

@php
  endwhile; endif;
@endphp
