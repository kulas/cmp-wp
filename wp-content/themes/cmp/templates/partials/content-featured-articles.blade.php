{{-- Featured Articles section of the homepage --}}

<div id="featured-articles">
  <div class="section--primary">
    <div class="section-hr">
      <hr>
      <div class="section-hr__h5">
        <h5>Carnegie Magazine</h5>
      </div>
    </div>

    @php
      if( have_rows('home_featured_articles') ):
      while ( have_rows('home_featured_articles') ) : the_row();
    @endphp

      @php
        if( get_row_layout() == 'main_feature'):

        $featured_image = get_sub_field('hero_image'); //gets full image array
        $featured_image_url = $featured_image['url']; //url of image
        $featured_image_id = $featured_image['id']; //id of image
        $featured_image_credit = App\get_media_credit_html($featured_image_id, false); //media credit for image

        $article = get_sub_field('article');
      @endphp

        <a href="{{ get_permalink($article) }}" aria-label="{{ get_sub_field('title') }}">
          <div class="hero-header" role="img" style="background-image: url('{{ $featured_image_url }}')" ></div>
        </a>

        <div class="media-details">
          <p class="media-details__caption">{{ $featured_image['caption'] }}</p>
          <p class="media-details__credit">{{ $featured_image_credit }}</p>
        </div>

        <div class="container pad">
          <h1 class="hero-header__words-box"><a href="{{ get_permalink($article) }}" class="black-link">{{ get_sub_field('title') }}</a></h1>
        </div>

        <div class="container pad">
          <div class="words-box">
            <h3 class="article__author">{{ the_sub_field('by_line') }}</h3>
            <h3 class="article__summary">
              {{ the_sub_field('lead_text') }}
            </h3>
          </div>
        </div>
      @php
        endif;
        endwhile;
        endif;
      @endphp
  </div>

  @php
    if( have_rows('home_featured_articles') ):
  @endphp
  <div class="section--primary">
    <div class="articles__featured">
      <div class="content-container">
        <div class="article-container">

          @php
            while ( have_rows('home_featured_articles') ) : the_row();
            if( get_row_layout() == 'featured_story'):

            $image = get_sub_field('image');
            $article = get_sub_field('article');
          @endphp

            <div class="article">
              <div class="img">
                <a href="{{ get_permalink($article) }}"><img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" /></a>
              </div>
              <div class="article__text-box">
                <h4><a class="black-link" href="{{ get_permalink($article) }}">{{ get_sub_field('title') }}</a></h4>
                {{ the_sub_field('lead_text') }}
              </div>
            </div>

          @php
            endif;
            endwhile;
          @endphp
        </div>
      </div>
    </div>
  </div>
  @php
    endif;
  @endphp
</div>
