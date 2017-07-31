{{-- Events spaces landing page --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="event-spaces">
  <div class="hero-header" style="background-image:url('{{ the_field('header') }}')"></div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
      <div class="main-text">{{ the_content() }}</div>
      <div class="spaces">

      @php
        if( have_rows('event_space') ): // These are actually the sub-pages, sorry for the confusing name choice.
        while ( have_rows('event_space') ) :
        the_row();
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
        endwhile; else : endif;
      @endphp

      </div>
    </div>

    @php
      endwhile; else : endif;
    @endphp

</div>
