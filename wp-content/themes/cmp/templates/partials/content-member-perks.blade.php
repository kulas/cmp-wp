{{-- 4 horizontal sub-page links that appear on various join & support pages --}}

<div class="member-perks">
  <div class="content-container">
    <div class="sub-page-container">

      @php // Has to be a separate block for some reason.
        if( have_rows('sub_page') ):
        while ( have_rows('sub_page') ) :
        the_row();
      @endphp

      <div class="sub-page">
        <a class="sub-page__image-link" href="{{ the_sub_field('link') }}">
          <img class="sub-page__image" src="{{ the_sub_field('image') }}" alt="{{ the_sub_field('title') }}">
        </a>
        <div class="sub-page__text-box">
          <h3><a href="{{ the_sub_field('link') }}">{{ the_sub_field('title') }}</a></h3>
        </div>
      </div>

      @php
        endwhile; else : endif;
      @endphp
  </div>
</div>

@php
  if(get_field('membership_callout_text')):
@endphp
<div class="content-container">
  <hr />
  <div class="content-wrapper">
    <div class="contact-us l-long">
      {!! get_field('membership_callout_text') !!}
    </div>
  </div>
</div>
@php
  endif;
@endphp
