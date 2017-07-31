{{-- Carnegie Magazine section 3--'Inside the Museums' --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

  <div class="carnegie-magazine-section-3">
    <div class="carnegie-magazine__big-picture">
      <a href="{{ the_field('inside_museums_link') }}">
        <div class="hero-header" style="background-image:url('{{ the_field('inside_museums_image') }}')"></div>
        <div class="content-container">
          <h1 class="hero-header__words-box">{{ the_field('inside_museums_title') }}</h1>
      </a>
        <p class="inside-museums-text">{{ the_field('inside_museums_text') }}</p>
      </div>
    </div>
  </div>

@php
  endwhile; else: endif;
@endphp
