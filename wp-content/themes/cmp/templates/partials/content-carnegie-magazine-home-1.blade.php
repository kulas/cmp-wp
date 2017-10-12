{{-- Carnegie Magazine homepage section 1 (stops before 'Big Picture' section) --}}

{{-- Cover Story section -- this weird thing is what's required to get a single 'post object' custom field --}}
@php
  global $post;
  $post_object = get_field('main_featured_article');
  if( $post_object ):
  $post = $post_object;
  setup_postdata( $post );

  $featured_image = get_field('featured_image'); //gets full image array
  $featured_image_url = $featured_image['url']; //url of image
  $featured_image_id = $featured_image['id']; //id of image
  $featured_image_credit = get_media_credit_html($featured_image_id, false); //media credit for image
@endphp

<div class="hero-header" role="img" aria-label="{{ get_the_title($post_object) }}"  style="background-image:url({{ $featured_image_url }})" >
  <div class="media-details">
    <p class="media-details__caption">@php echo $featured_image['caption']; @endphp</p>
    <p class="media-details__credit">@php echo $featured_image_credit; @endphp</p>
  </div>
</div>
<div class="magazine-featured-articles">
  <div class="magazine-featured-articles__main">
    <div class="content-container">
      <div class="main-article-content">
        <a href="{{ the_permalink() }}">
          <h1 class="robot--bold">{{ the_title() }}</h1>
        </a>
        <p class="main-article-content__excerpt">{{ the_excerpt() }}</p>
        <p class="author">By {{ the_field('author') }}</p>

        @php
          wp_reset_postdata(); //This resets the post object so the rest of the page works normally
          endif;
        @endphp
        {{-- End cover story section --}}

      </div>
      <hr />
      <h2 class="uppercase-robot--large">Featured Stories</h2>

      {{-- Featured stories section --}}
      <div class="featured-stories">
      {{-- And this nightmare is what allows you to loop through a repeater of post objects --}}
        @php
          if( have_rows('secondary_featured_articles') ):
          while ( have_rows('secondary_featured_articles') ) : the_row();
          $post_object = get_sub_field('article');
          if( $post_object ):
          $post = $post_object; setup_postdata( $post );

          $featured_image = get_field('featured_image'); //gets full image array
          $featured_image_url = $featured_image['url']; //url of image
        @endphp

        <div class="article">
          <div class="categories">@php(the_tags( '', ' | ', '' ))</div>
          <a href="{{ the_permalink() }}">
            <div class="article__image-container">
              <img src="{{ $featured_image_url }}" alt="{{ the_title() }}">
            </div>
            <h3 class="robot--bold">{{ the_title() }}</h3>
          </a>
          <p>{{ the_excerpt() }}</p>
          <p class="author">{{ the_field('author') }}</p>
        </div>

          {{-- Resets postdata, checks to see if there are more posts in repeater, loops if there area --}}
          @php
            wp_reset_postdata();
            endif;
            endwhile;
          @endphp

          <hr />
      </div>

    @php
      endif;
    @endphp

    </div>

    {{-- 'Square' section of featued articles  --}}
    <div class="magazine-featured-articles__section-3">

      @php
        if( have_rows('featured_articles_3') ):
        while ( have_rows('featured_articles_3') ) : the_row();
        $post_object = get_sub_field('article');
        if( $post_object ):
        $post = $post_object; setup_postdata( $post );
      @endphp

      <div class="article">
        <div class="categories">@php(the_tags( '', ' | ', '' ))</div>
        <a href="{{ the_permalink() }}">
          <div class="article__image-container">
            <img src="{{ get_field('square_image') }}" alt="{{the_title()}}">
          </div>
          <h3>{{ the_title() }}</h3>
        </a>
        <p>{{ the_excerpt() }}</p>
        <p class="author">By {{ the_field('author') }}</p>
      </div>

      {{-- Resets postdata, checks to see if there are more posts in repeater, loops if there area --}}
      @php
        wp_reset_postdata();
        endif;
        endwhile;
      @endphp

      </div>
      {{-- End of magazine featured articles main section --}}
    </div>

    @php
      endif;
    @endphp


    {{-- Sidebar section --}}
    <div class="magazine-featured-articles__sidebar">
      <h3 class="uppercase-robot--large center">Current Issue</h3>
      <div class="magazine-featured-articles__sidebar__container">
        <a href="/carnegie-magazine/current-issue">
          <img src="{{ the_field('current_issue') }}" alt="{{ the_field('current_issue_title') }}"/>
        </a>
        <h3 class="uppercase-robot--large center">Sign up<br /> to receive<br /> more stories<br /> in your email</h3>
        <button class="grey-button">Enter Your Email</button>
        <div class="most-read-articles">

          {{-- Gets featured sidebar post objects --}}
          @php
            if( have_rows('sidebar_articles') ):
            while ( have_rows('sidebar_articles') ) : the_row();
            $post_object = get_sub_field('article');
            if( $post_object ):
            $post = $post_object; setup_postdata( $post );

            $featured_image = get_field('featured_image'); //gets full image array
            $featured_image_url = $featured_image['url']; //url of image
          @endphp

            <div class="article">
              <div class="categories">@php(the_tags( '', ' | ', '' ))</div>
              <a href="{{ the_permalink() }}">
                <div class="article__image-container">
                  <img src="{{ $featured_image_url }}" alt="{{ the_title() }}">
                </div>
                <h4 class="robot--bold">{{ the_title() }}</h4>
              </a>
              <p>{{ the_excerpt() }}</p>
              <p class="author">By {{ the_field('author') }}</p>
            </div>

            {{-- Resets postdata, checks to see if there are more posts in repeater, loops if there area --}}
            @php
              wp_reset_postdata();
              endif;
              endwhile;
            @endphp

            </div>
          </div>

          @php
            endif;
          @endphp

        </div>
      </div>

