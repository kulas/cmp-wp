@extends('layouts.base')

@php
  $term = get_queried_object();
  $image = get_field('header_image', "term_{$term->term_id}");
  $image_id = $image['id'];
  $image_url = $image['url'];
  $image_credit = App\get_media_credit_html($image_id, false);
@endphp

@section('content')

<div class="{{ $image_url ? 'basic' : 'no' }}-header">
  @if ($image_url)
    <div class="hero-header" role="img" aria-label="{{ the_title() }}" style="background-image:url('{{ $image_url }}')"></div>
    <div class="media-details">
      <p class="media-details__caption">@php echo $image['caption']; @endphp</p>
      <p class="media-details__credit">@php echo $image_credit; @endphp</p>
    </div>
  @endif
  <div class="content-container">
    <h1>{{ single_term_title() }}</h1>
    <div class="content-wrapper">
      <div class="l-long">
        @php
          if (have_posts()) : while (have_posts()) : the_post();
        @endphp
          @include('partials.content-expert')
        @php
          endwhile; endif;
        @endphp
      </div>
      <div class="l-short">
      </div>
    </div>
  </div>
</div>

@endsection
