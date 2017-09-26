{{--
  Carnegie Magazine Current Issue 'Features' Section
--}}

<div class="carnegie-magazine-current-1 carnegie-magazine-current-2">
  <div class="content-container">
    <h2 class="robot-uppercase">Features</h2>
    <hr/>
    <div class="features">

        {{-- This gets all rows from the Featured Articles custom field --}}
        @php
          global $post;
          if( have_rows('featured_articles') ):
          while ( have_rows('featured_articles') ) : the_row();
          $post_object = get_sub_field('article');
          if( $post_object ):
          $post = $post_object; setup_postdata( $post );
        @endphp

        <div class="article">
          <div class="categories">@php(the_tags( '', ' | ', '' ))</div>
          <a href="{{ the_permalink() }}">
          <div class="article__image-container">
            <img src="{{ the_field('square_image') }}" alt="{{ the_title() }}">
          </div>
            <h3 class="green-robot-link">{{ the_title() }}</h3>
          </a>
          <p>{{ the_excerpt() }}</p>
          <p class="author">By {{ the_field('author') }}</p>
        </div>

        @php
          wp_reset_postdata();
          endif;
          endwhile;
          endif; //Ends Featured Articles field
        @endphp

      </div>
    </div>
  </div>
</div>
