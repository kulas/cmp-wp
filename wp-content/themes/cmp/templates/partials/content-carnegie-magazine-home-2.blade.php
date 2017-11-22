{{-- Carnegie Magazine homepage middle section--'Big Picture' and Facetime --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();

  $big_picture_image = get_field('big_picture_image'); //gets full image array
  $big_picture_image_url = $big_picture_image['url']; //url of image
  $big_picture_image_id = $big_picture_image['id']; //id of image
  $big_picture_image_credit = get_media_credit_html($big_picture_image_id, false); //media credit for image
@endphp

  <div class="carnegie-magazine-section-2">
    <div class="carnegie-magazine__big-picture">
      <a href="{{ the_field('big_picture_link') }}" aria-label="{{get_field('big_picture_title')}}">
        <div class="hero-header" role="img" style="background-image:url('{{ $big_picture_image_url }}')">
        </div>
      </a>
      <div class="media-details">
        <p class="media-details__caption">{{ $big_picture_image['caption'] }}</p>
        <p class="media-details__credit">{{ $big_picture_image_credit }}</p>
      </div>
      <div class="content-container">
        <h1 class="hero-header__words-box sans-serif">{{ the_field('big_picture_title') }}</h1>
        <div class="content-wrapper">
          <div class="l-long">
            <p>{{ the_field('big_picture_text') }}</p>
          </div>
        </div>
        <hr />
      </div>
    </div>
      <div class="carnegie-magazine__facetime">
        <div class="content-container">
          <h2 class="facetime-title">Face Time</h2>
          <div class="facetime">

          @php
            $count=1; //This is for a counter so I can use the same repeater for all content in the Facetime section.

            if( have_rows('facetime') ):
            while ( have_rows('facetime') ) :
            the_row();

            if ($count==1) { //Format custom field as the large version on the left side.
          @endphp

            <div class="facetime__left">
              <a href="{{ the_sub_field('link') }}">
                <div class="face">
                  <img src="{{ the_sub_field('image') }}" alt="{{ the_sub_field('name') }}" />
                  <p class="facetime__left__name">{{ the_sub_field('name') }}</p>
                </div>
              </a>
              <p class="facetime__text">{{ the_field('facetime_text') }}</p>
            </div>

            @php
              } //required to end section of code that occurs when the counter = 1
              if ($count==2) {
            @endphp

            {{-- We just want this div once, right before the second object in the repeater --}}
            <div class="facetime__right">

              @php
                }
                if ($count >= 2) { // Now we repeat the 3 vertical facetime images/names/links.
              @endphp

              <div class="face">
                <a href="{{ the_sub_field('link') }}">
                  <img src="{{ the_sub_field('image') }}" alt="{{ the_sub_field('name') }}" />
                  <p>{{ the_sub_field('name') }}</p>
                </a>
              </div>

              @php
                }
                if ($count==4) { //If count = 4, end the Facetime Right div.
              @endphp

            </div>

          @php
            }
            $count = $count + 1
          @endphp

          @php
            endwhile; else : endif; // This needs to be in its own section for reasons unknown.
          @endphp

        </div>
        <hr />
      </div>
    </div>
  </div>

@php
  endwhile; else: endif;
@endphp
