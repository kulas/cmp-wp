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
  @endphp

  <div class="hero-header" style="background-image: url('{{ the_field('featured_image') }}')"></div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h2>
  </div>
  <div class="articles__featured content-container">
    <div class="words-box">
      <h3 class="article__author">by {{ the_author() }}</h3>
      <h2 class="article__quote">{{ the_field('quote') }}</h2>
      <h3 class="article__summary">

        @php
  				$excerpt = get_the_excerpt();
  				$output = '<p>'.$excerpt.' <a href="'.get_permalink().'">Read Article ></a></p>'; // This allows the read article link on mobile can be inline with the description.
  				echo $output;
  			@endphp

      </h3>
      <a id="article__button" class="green-button" href="{{ the_permalink() }}">Read the Article</a>
    </div>
  <hr class="magazine-hr">
  <div class="carnegie-magazine">
    <div class="carnegie-magazine__left-div">
      <img id="carnegie-magazine__cover" src="/wp-content/themes/cmp/assets/images/carnegie-magazine.png">
    </div>
    <div class="carnegie-magazine__right-div">
      <img id="carnegie-magazine__logo" src="/wp-content/themes/cmp/assets/images/carnegie-magazine-logo.png">
      <a class="green-button" href="http://www.carnegiemuseums.org/cmp/cmag/index.php">Read Current & Past Issues</a>
    </div>
  </div>

  @php
    wp_reset_postdata(); // Resets data from main featured article post object
    endif;
  @endphp

  <h5 class="uppercase-robot featured-articles-title">Featured Articles</h5>
  <div class="article-container">

  @php
    if( have_rows('featured_articles') ):
    while ( have_rows('featured_articles') ) : the_row(); // Gets featured article post objects; loops through featured posts repeater
    $post_object = get_sub_field('article');
    if( $post_object ):
    $post = $post_object; setup_postdata( $post );
  @endphp

    <div class="article">
      <img src="{{ the_field('square_image') }}">
      <div class="article__text-box">
        <h4><a href="{{ the_permalink() }}">{{ the_title() }}</a></h4>
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
      <img src="/wp-content/themes/cmp/assets/images/carnegie-magazine.png">
      <div class="article__text-box">
        <h4><a href="#">Additional Articles</a></h4>
        <p>Read more from Carnegie Magazine.</p>
        <button class="green-button">Read More Articles</button>
      </div>
    </div>
  </div>
 </div>
</div>
