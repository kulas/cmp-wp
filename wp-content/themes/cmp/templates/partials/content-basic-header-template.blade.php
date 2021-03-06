{{-- Basic Page Template With Header Custom Header Field --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();

  $image = get_field('header_image');
  $image_id = $image['id'];
  $image_url = $image['url'];
  $image_credit = App\get_media_credit_html($image_id, false);

@endphp

<div class="basic-header">
  <div class="hero-header" role="img" aria-label="{{ $image['alt'] }}" style="background-image:url('{{ $image_url }}')">
  </div>
  <div class="media-details">
    <p class="media-details__caption">@php echo $image['caption']; @endphp</p>
    <p class="media-details__credit">@php echo $image_credit; @endphp</p>
  </div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }} </h1>
    <div class="breadcrumb-container">
      <div class="nav-breadcrumb">

        @php //This displays the breadcrumb (e.g. Things to Do > Nights at the Museums)
          if (function_exists('bcn_display')) {
            bcn_display();
          }
        @endphp

      </div>
    </div>
    <hr class="breadcrumb-hr">
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
    @include('partials.tabs')
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
