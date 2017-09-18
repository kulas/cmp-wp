{{-- Featured Articles section of the homepage --}}

<div id="featured-articles" class="section--primary">
  <div class="section-hr">
    <hr>
    <div class="section-hr__h5">
      <h5>Carnegie Magazine</h5>
    </div>
  </div>

  @php
    global $post;
    $post_object = get_field('main_featured_article'); // Gets main featured article custom field post object.
    if( $post_object ):
    $post = $post_object;
    setup_postdata( $post );

    $featured_image = get_field('featured_image'); //gets full image array
    $featured_image_url = $featured_image['url']; //url of image
    $featured_image_id = $featured_image['id']; //id of image
    $featured_image_credit = get_media_credit_html($featured_image_id); //media credit for image
  @endphp






  <a href="{{ the_permalink() }}" aria-label="{{ the_title() }}">

    <div class="hero-header" role="img" style="background-image: url('{{ $featured_image_url }}')" ></div>

  </a>

  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h2>
    <div class="words-box">
      <h3 class="article__author">by {{ the_field('author') }}</h3>
      <h2 class="article__quote">{{ the_field('quote') }}</h2>
      <h3 class="article__summary">

        @php
          $excerpt = get_the_excerpt();
          $output = '<p>'.$excerpt.' <a href="'.get_permalink().'">Read Article ></a></p>'; // This allows the read article link on mobile can be inline with the description.
          echo $output;
        @endphp

      </h3>
      <a id="article__button" class="green-button" href="{{ the_permalink() }}">Read More</a>
    </div>

    @php
      wp_reset_postdata(); // Resets data from main featured article post object
      endif;
    @endphp
  </div>

  <div class="articles__featured content-container">
    <h5 class="uppercase-robot featured-articles-title">Featured Stories</h5>
    <div class="article-container">

    @php
      if( have_rows('featured_articles') ):
      while ( have_rows('featured_articles') ) : the_row(); // Gets featured article post objects; loops through featured posts repeater
      $post_object = get_sub_field('article');
      if( $post_object ):
      $post = $post_object; setup_postdata( $post );
    @endphp

      <div class="article">
        <img src="{{ the_field('square_image') }}" alt="{{ the_title() }} ">
        <div class="article__text-box">
          <a class="black-link" href="{{ the_permalink() }}"><h6 class="uppercase-robot">{{ the_title() }}</h6></a>
          <p>{{ the_field('summary') }}</p>
        </div>
      </div>

      @php // Resets postdata and continues looping through the featured articles repeater.
        wp_reset_postdata();
        endif;
        endwhile;
        endif;
      @endphp

      <div class="article">
        <img src="@asset('images/carnegie-magazine.png')" alt="Carnegie Magazine" />
        <div class="article__text-box">
          <h6 class="uppercase-robot"><a href="/carnegie-magazine/" class="black-link">Get the Whole Scoop</a></h6>
          <p>Check out all the latest stories from CARNEGIE magazine and visit our archives.</p>
          <a class="green-button" href="/carnegie-magazine/" role="link">Read More Articles</a>
        </div>
      </div>
    </div>
  </div>
</div>
