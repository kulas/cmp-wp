{{-- Oh boy, this is the template for a single Carnegie Magazine article AKA blog post. Sorry. --}}

<article @php(post_class())>
  <header>
    <img class="entry-image" src="{{ the_field('featured_image') }}" />
    <div class="title-box">
      <h1 class="entry-title">{{ get_the_title() }}</h1>
      <p class="article__summary">{{ get_the_excerpt() }}</p>
      <p class="author">By {{ the_field('author') }}</p>
    </div>
  </header>
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
        <p class="small-uppercase--bold">Text Size:</p>

          @php
            if (function_exists('fontResizer_place')) { // font resizer plugin
              fontResizer_place();
            }
          @endphp

      </div>
    </div>
    <hr>
    <div class="article__related">
      <h4 class="center">You May Also Like</h4>

      {{-- This is the related/'you may also like' post sidebar --}}

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
        if ($my_query->have_posts()) {
        while ($my_query->have_posts()) :
        $my_query->the_post();
      @endphp

      {{-- Related Posts --}}
      <div class="tags">

        @php(the_tags( '', ' | ', '' ))

      </div>
      <div class="image-container" style="background-image:url({{ the_field('featured_image') }})"></div>
      <a href="{{ the_permalink() }}">{{ the_title() }} </a>
      <div class="excerpt">{{ the_excerpt() }}</div>
      <p class="author">{{ the_field('author') }}</p>

      @php endwhile;
        }
          wp_reset_query(); // End related posts.
        }
      @endphp

    </div>
  <div class="article__content">
    <div class="article__main">
      {{ the_content() }}
    </div>
  </div>
  <div class="magazine-subscribe">
    <p class="uppercase-robot">Sign up</br>
    to receive</br>
    more stories</p>
    <button class="grey-button">Subscribe</button>
  </div>
</article>
