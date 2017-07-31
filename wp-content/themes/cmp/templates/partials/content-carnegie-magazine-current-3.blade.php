{{--
  Template Name: Carnegie Magazine Current Issue Section 3
--}}

<div class="carnegie-magazine-current-3">
  <div class="content-container">
    <div class="also-in-issue">
      <h2 class="robot-uppercase">Also in this Issue</h2>
      <hr/>

      {{-- Gets the posts from the 'Also in Issue' custom field --}}
      @php
        global $post;
        if( have_rows('also_in_issue') ):
        while ( have_rows('also_in_issue') ) : the_row();
        $post_object = get_sub_field('article');
        if( $post_object ):
        $post = $post_object; setup_postdata( $post );
      @endphp

      <div class="also-article">
        <div class="also-article__left">
          <div class="article__image-container">
            <a href="{{ the_permalink() }}">
              <img src="{{ the_field('square_image') }}">
            </a>
          </div>
          <p class="feature-type">{{ the_field('feature_type') }}</p>
        </div>
        <div class="also-article__right">
          <div class="categories">@php(the_tags( '', ' | ', '' ))</div>
          <a href="{{ the_permalink() }}">
            <h3 class="green-robot-link">{{ the_title() }}</h3>
          </a>
          <p>{{ the_excerpt() }}</p>
          <p class="author">By {{ the_field('author') }}</p>
        </div>
      </div>

      @php wp_reset_postdata();
        endif;
        endwhile;
        endif; //End Also in Issue custom field.
      @endphp

    </div>
  </div>
</div>
