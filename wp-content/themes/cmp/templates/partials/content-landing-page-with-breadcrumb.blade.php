{{--  Basic Landing Page With Breadcrumb/has large square sub-page images/links --}}

{{-- Uses the same general layout as event spaces, thus the class --}}
<div class="event-spaces">

  @php
    if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();

    $header_image = get_field('header'); //gets full image array
    $header_image_url = $header_image['url']; //url of image
    $header_image_id = $header_image['id']; //id of image
    $header_image_credit = get_media_credit_html($header_image_id, false); //media credit for image
  @endphp

  <div class="hero-header" role="img" aria-label="{{the_title()}}" style="background-image:url('{{ $header_image_url }}')">
  </div>
  <div class="media-details">
    <p class="media-details__caption">@php echo $header_image['caption']; @endphp</p>
    <p class="media-details__credit">@php echo $header_image_credit; @endphp</p>
  </div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
    <div class="breadcrumb-container">
      <div class="nav-breadcrumb">

        @php
          if (function_exists('bcn_display')) //The breadcrumb plugin
            {
                bcn_display();
            }
        @endphp

      </div>
    </div>

    <div class="content-wrapper">
      <div class="l-long">
        {{ the_content() }}
      </div>
      <div class="l-short">
        @php
          if( have_rows('sidebar_content') ):
          while( have_rows('sidebar_content') ):
          the_row();
        @endphp
        <h3>{{ the_sub_field('heading') }}</h3>
        {{ the_sub_field('text') }}
        @php
          endwhile; endif;
        @endphp
      </div>
    </div>
    <hr />
  </div>

  <div class="content-container item-grid">

    @php
      if( have_rows('event_space') ):
      while ( have_rows('event_space') ) : the_row(); // loops through sub-pages
    @endphp

      <div class="activity">
        <a href="{{ the_sub_field('link') }}">
          <div class="activity__image" role="img" aria-label="{{ the_sub_field('name') }}" style="background-image:url('{{ the_sub_field('image') }}')">
            <div class="activity__title">
              <h3>{{ the_sub_field('name') }}</h3>
            </div>
          </div>
        </a>
        {{ the_sub_field('description') }}
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
