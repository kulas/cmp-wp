{{-- No Header Template --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();

  // $image = get_field('header_image');
  // $image_id = $image['id'];
  // $image_url = $image['url'];
  // $image_credit = get_media_credit_html($image_id);

@endphp

<div class="basic-header">
    <div class="content-container">
        <div class="main-text spaced">
          {{-- <div class="nav-breadcrumb">
            @php
              if (function_exists('bcn_display')) //The breadcrumb plugin
                {
                    bcn_display();
                }
            @endphp
          </div> --}}
          <h1>{{ the_title() }}</h1>
          {{ the_content() }}
    </div>
    @include('partials.tabs')
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
