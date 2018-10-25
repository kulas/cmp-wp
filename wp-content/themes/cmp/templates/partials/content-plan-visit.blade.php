{{-- 3-column Plan a Visit page --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();

  $header_image = get_field('header_image'); //gets full image array
  $header_image_url = $header_image['url']; //url of image
  $header_image_id = $header_image['id']; //id of image
  $header_image_credit = App\get_media_credit_html($header_image_id, false); //media credit for image
@endphp

<div class="plan-visit">
  <div class="hero-header" role="img" aria-label="{{ $header_image['alt'] }}" style="background-image:url('{{ $header_image_url }}')">
  </div>
  <div class="media-details">
    <p class="media-details__caption">@php echo $header_image['caption']; @endphp</p>
    <p class="media-details__credit">@php echo $header_image_credit; @endphp</p>
  </div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
    <div class="museum-container">

      @php
        if( have_rows('museum_details') ):
        while ( have_rows('museum_details') ) :
        the_row()
      @endphp

        <div class="museum-container__museum">
          {{ the_sub_field('museum_details') }}
        </div>

      @php
        endwhile; else : endif;
      @endphp

    </div>
  </div>
</div>

@php
  endwhile; else : endif;
@endphp
