{{--
Template Name: More Things to Do
--}}

@php
  $page_id = $post->ID;
  if(get_field( 'sub_page', $post->post_parent )) {
    $page_id = $post->post_parent;
  }
  if( get_field( 'sub_page', $page_id ) ):
@endphp

<div id="more-things-to-do">
  <div class="content-container">
    <div class="section-hr">
      <hr>
      <div class="section-hr__h5">
        <h5>More Things to Do</h5>
      </div>
    </div>
    <div class="activity-container">

    @php
      while( has_sub_field( 'sub_page', $page_id ) ):
    @endphp

    <div class="activity">
      <a href="{{ the_sub_field('link') }}" aria-label="{{ the_sub_field('title') }}">
        <div class="activity__main-image" role="img" style="background-image: url('{{the_sub_field("image")}}') "></div>
      </a>
      <div class="activity__text-box">
        <h4>{{ the_sub_field('title') }}</h4>
        <p>{{ the_sub_field('description') }}</p>
      </div>
    </div>

    <hr class="activity__hr" />

    @php
      endwhile;
    @endphp

    </div>
  </div>
</div>

@php
  endif;
@endphp
