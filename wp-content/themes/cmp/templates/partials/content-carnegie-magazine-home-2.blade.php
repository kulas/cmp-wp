{{-- Carnegie Magazine homepage middle section--'Big Picture' and Facetime --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();

  $big_picture_image = get_field('big_picture_image'); //gets full image array
  $big_picture_image_url = $big_picture_image['url']; //url of image
  $big_picture_image_id = $big_picture_image['id']; //id of image
  $big_picture_image_credit = get_media_credit_html($big_picture_image_id); //media credit for image
@endphp

  <div class="carnegie-magazine-section-2">
    <a href="{{ the_field('big_picture_link') }}">
    <div class="carnegie-magazine__big-picture">
        <div class="hero-header" style="background-image:url('{{ $big_picture_image_url }}')">
        </div>
        <div class="content-container">
            <h1 class="hero-header__words-box robot">{{ the_field('big_picture_title') }}</h1>
            <p class="media-credit">@php echo $big_picture_image_credit; @endphp</p>
          </a>
        <p>{{ the_field('big_picture_text') }}</p>
        <hr />
      </div>
    </div>
      <div class="carnegie-magazine__facetime">
        <div class="content-container">
          <h2 class="facetime-title uppercase-robot">Face Time</h2>
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
                  <img src="{{ the_sub_field('image') }}">
                  <p class="facetime__left__name">{{ the_sub_field('name') }}</p>
                </div>
              </a>
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
                  <img src="{{ the_sub_field('image') }}">
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
        <p class="facetime__text">{{ the_field('facetime_text') }}</p>
      </div>
    </div>
  </div>

@php
  endwhile; else: endif;
@endphp
