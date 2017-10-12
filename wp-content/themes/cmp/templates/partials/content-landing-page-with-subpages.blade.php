{{-- Template Name: Landing Page With Subpages --}}

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

  <div class="hero-header" role="img" style="background-image:url('{{ $header_image_url }}')">
    <div class="media-details">
      <p class="media-details__caption">@php echo $header_image['caption']; @endphp</p>
      <p class="media-details__credit">@php echo $header_image_credit; @endphp</p>
    </div>
  </div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
      <div class="main-text">{{ the_content() }}</div>
      <hr>
        <div class="spaces">

          @php
            if( have_rows('event_space') ): // looping through sub-page repeater
            while ( have_rows('event_space') ) :
            the_row();
          @endphp

          <div class="event-space">
            <a href="{{ the_sub_field('link') }}">
              <div class="event-space__image-container" role="img" style="background-image: url('{{ the_sub_field('image')}} ')">
                <img src="{{ the_sub_field('image') }}" alt="{{ the_sub_field('name') }}"/>
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
    endwhile; else: endif;
  @endphp

</div>
