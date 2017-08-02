{{--  Basic Landing Page With Breadcrumb/has large square sub-page images/links --}}

{{-- Uses the same general layout as event spaces, thus the class --}}
<div class="event-spaces">

  @php
    if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();
  @endphp

  <div class="hero-header" style="background-image:url('{{ the_field('header') }}')"></div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
    <div class="nav-breadcrumb">

      @php
        if (function_exists('bcn_display')) //The breadcrumb plugin
          {
              bcn_display();
          }
      @endphp

    </div>
    <hr class="breadcrumb-hr">
      <div class="main-text">{{ the_content() }}</div>
      <div class="spaces">

      @php
        if( have_rows('event_space') ):
        while ( have_rows('event_space') ) : the_row(); // loops through sub-pages
      @endphp

        <div class="event-space">
            <a href="{{ the_sub_field('link') }}">
            <div class="event-space__image-container">
              <img src="{{ the_sub_field('image') }}" />
              <h2>{{ the_sub_field('name') }}</h2>
            </div>
          </a>
          <p>{{ the_sub_field('description') }}</p>
        </div>

        @php
          endwhile; else : endif; // end sub-page loop
        @endphp

      </div>
    </div>

  @php
    endwhile; else : endif;
  @endphp

</div>
