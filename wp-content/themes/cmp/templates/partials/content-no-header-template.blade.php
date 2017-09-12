{{-- No Header Template --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();

  // $image = get_field('header_image');
  // $image_id = $image['id'];
  // $image_url = $image['url'];
  // $image_credit = get_media_credit_html($image_id);

@endphp

<div class="basic-header magazine-sub-page">

  {{-- <div class="hero-header" style="background-image:url('{{ $image_url }}')">
    <p class="media-credit">@php echo $image_credit; @endphp</p>
  </div> --}}

    <div class="content-container">
        <div class="main-text spaced">
          {{ the_content() }}

          @php
            $tabs = the_field('tab_layout');
            if ($tabs != null) {
              include('partials.tabs');
            }
          @endphp

    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
