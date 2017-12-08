{{-- Oh boy, this is the template for a single Carnegie Magazine article AKA blog post. Sorry. --}}


@php

  $header_image = get_field('featured_image'); //gets full image array
  $header_image_url = $header_image['url']; //url of image
  $header_image_id = $header_image['id']; //id of image
  $header_image_credit = App\get_media_credit_html($header_image_id, false); //media credit for image
  $hide_hero_header = get_field('hide_hero_header');

@endphp

@if (!empty($header_image) && empty($hide_hero_header))
  <div class="hero-header">
    {!! wp_get_attachment_image($header_image_id, 'full') !!}
  </div>
  <div class="media-details">
    <p class="media-details__caption">@php echo $header_image['caption']; @endphp</p>
    <p class="media-details__credit">@php echo $header_image_credit; @endphp</p>
  </div>
@else
  <div class="hero-header" style="height: 50px;"></div>
@endif

  <article @php(post_class())>

    <div class="title-box">
      <h1 class="entry-title">{{ get_the_title() }}</h1>
      @if (trim($post->post_excerpt))
        <p class="article__summary">{{{ get_the_excerpt() }}}</p>
      @endif
      @if (get_field('author'))
        <p class="author">{{ the_field('author') }}</p>
      @endif
    </div>
  <div class="entry-content">
    <hr>

    {{-- The top bar with tags, issue, print button, etc. --}}
    <div class="article-meta">
      <div class="article-meta__main">
        <div class="tags">

          @php(the_tags( '', ' | ', '' ))

        </div>
      <p class="article-meta__divider">|</p>
      <div class="article-meta__issue">
        {{ the_category(' | ') }}
      </div>
      <p class="article-meta__divider">|</p>
      <a class="print" href="#" onClick="window.print();"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
    </div>
      <div class="font-resizer">

        <div class="social-share">

          @php
            echo do_shortcode('[ess_post]'); // social media sharing buttons.
          @endphp

        </div>
        <p class="article-meta__divider">|</p>
        <div class="font-resizer__wrap">
          <p class="small-uppercase--bold"><span class="hidden-mobile">Text</span> Size:</p>
          @php
            if (function_exists('fontResizer_place')) { // font resizer plugin
              fontResizer_place();
            }
          @endphp
        </div>

      </div>
    </div>
    <hr>
    <div class="content-sidebar-container">

    <div class="article__content">
      <div class="article__main">

        @php // This gets 3 related posts by the first tag of an article.
          $tags = wp_get_post_tags($post->ID);
          if ($tags) {
              $first_tag = $tags[0]->term_id;
              $args=array(
                'tag__in' => array($first_tag),
                'post__not_in' => array($post->ID),
                'posts_per_page'=>3,
                'caller_get_posts'=>3
              );
            $my_query = new WP_Query($args);
          }
        @endphp

        @if ($my_query && $my_query->have_posts())
          <div class="article__related">
            <h4 class="center">You May Also Like</h4>

            {{-- This is the related/'you may also like' post sidebar --}}

            @php
              while ($my_query->have_posts()): $my_query->the_post();
            @endphp

            @php
              $featured_image = get_field('featured_image'); //gets full image array
              $featured_image_url = $featured_image['url']; //url of image
              $featured_image_id = $featured_image['id']; //id of image
              $featured_image_credit = App\get_media_credit_html($featured_image_id); //media credit for image
            @endphp

            {{-- Related Posts --}}
            <div class="tags">
              @php(the_tags( '', ' | ', '' ))
            </div>

            @if ($featured_image_url)
              <div class="image-container" role="img" style="background-image:url({{ $featured_image_url }})"></div>
            @endif
            <a href="{{ the_permalink() }}">{{ the_title() }} </a>
            <div class="excerpt">{{ the_excerpt() }}</div>
            <p class="author">{{ the_field('author') }}</p>

            @php
              endwhile;
              wp_reset_query(); // End related posts.
            @endphp

          </div>
        @endif

        {{ the_content() }}
      </div>
    </div>
  </div>

  <div class="magazine-subscribe">
    <p class="serif label"><strong>Sign up to receive more stories in your email</strong></p>
    @include('partials/magazine-signup-form')
  </div>

  @php
    ob_start();
    the_tags( '', ' ', '' );
    $tags = ob_get_clean();
  @endphp

  @if ($tags)
    <div class="bottom-tags">
      <p>Tags:</p>
      {!! $tags !!}
    </div>
  @endif
</article>
