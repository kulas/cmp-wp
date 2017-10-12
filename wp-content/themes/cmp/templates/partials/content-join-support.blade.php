{{-- Join and Support page --}}

<div class="join-support">

  @php
    if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();

    $rows = get_field('members'); // get all rows of member images
    shuffle ($rows); // shuffle member images
    $row = $rows[0];

    $header_image = $row['image']; //gets full image array
    $header_image_url = $header_image['url']; //url of image
    $header_image_id = $header_image['id']; //id of image
    $header_image_credit = get_media_credit_html($header_image_id, false); //media credit for image
  @endphp

  <div class="hero-header" role="img" aria-label="Carnegie Museums members sitting on a couch" style="background-image:url('{{ $header_image_url }}')">
    <div class="media-details">
      <p class="media-details__caption">@php echo $header_image['caption']; @endphp</p>
      <p class="media-details__credit">@php echo $header_image_credit; @endphp</p>
    </div>
  </div>
    <div class="content-container">
      <h1 class="hero-header__words-box">{{ the_title() }}</h1>
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

      <hr>

        <div class="sub-pages">

          @php
            $i = 1; // part of image shuffling mechanism

            if( have_rows('sub-pages') ):
            while ( have_rows('sub-pages') ) :
            the_row()
          @endphp

            <div class="sub-page">


              <a href="{{ the_sub_field('link') }}">
                <div class="sub-page__background" role="img" style="background-image:url('{{ $rows[$i]['image']['url'] }}'">

                  <div class="sub-page__title">
                      <h3>{{ the_sub_field('title') }}</h3>
                  </div>
                  {{-- <h4 class="sub-page__quote">"{{ $rows[$i]['quote'] }}"</h4> --}}
                </div>
              </a>
              {{ the_sub_field('description') }}
            </div>

        @php
          $i = $i+1;
          endwhile; else : endif;
        @endphp

      </div>
    </div>

  @php
    $i = $i+1;
    endwhile; else : endif;
  @endphp

</div>
