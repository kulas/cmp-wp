{{-- Things to Do Subcategory --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="things-to-do-subcategory">
  <div class="content-container">
    <div class="large-title">
      <h1>{{ the_title() }}</h1>
    </div>
    <div class="nav-breadcrumb">

      @php
        if(function_exists('bcn_display'))
          {
              bcn_display();
          }
      @endphp

    </div>
    <hr>
  </div>
  <div class="content-container item-grid">

    @php
      if( have_rows('activity') ):
      while ( have_rows('activity') ) :
      the_row();

      $image_url = get_sub_field('image');
      $image_id = App\get_image_from_url($image_url);
      $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    @endphp

    <div class="activity">
      <a href="{{ the_sub_field('external_link') }} {{ the_sub_field('internal_link') }}">
        <div class="activity__image" role="img" aria-label="{{ $image_alt }}" style="background-image:url('{{ $image_url }}')">
          <div class="activity__title">
            <h3>{{ the_sub_field('title') }}</h3>
          </div>
        </div>
      </a>
     {{ the_sub_field('description') }}
    </div>

    @php
      endwhile; else : endif;
    @endphp

  </div>
</div>

@include('partials.content-more-things-to-do')

@php
  endwhile; else : endif;
@endphp
