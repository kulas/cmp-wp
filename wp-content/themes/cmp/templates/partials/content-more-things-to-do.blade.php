{{--
Template Name: More Things to Do
--}}

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
      $page_id = 413;
      if( get_field( 'sub_page', $page_id ) ): // Gets custom field from Nights at the Museum page so it can be edited in one place.
      while( has_sub_field( 'sub_page', $page_id ) ):
    @endphp

    <div class="activity">
      <a href="{{ the_sub_field('link') }}" aria-label="{{ the_sub_field('title') }}">
        <div class="activity__main-image" style="background-image: url('{{the_sub_field("image")}}') "></div>
        <div class="activity__text-box">
          <h4>{{ the_sub_field('title') }}</h4>
      </a>
        <p>{{ the_sub_field('description') }}</p>
      </div>
    </div>

    <hr class="activity__hr" />

    @php
      endwhile; else : endif;
    @endphp

    </div>
   </div>
  </div>
</div>
