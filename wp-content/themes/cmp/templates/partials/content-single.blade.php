<article @php(post_class())>
  <header>
    <img class="entry-image" src="{{ the_field('featured_image') }}" />

    <div class="title-box">
      <h1 class="entry-title">{{ get_the_title() }}</h1>
      @include('partials/entry-meta')

      <p class="article__summary">{{ get_the_excerpt() }}</p>
      <hr>
    </div>

  </header>

  <div class="entry-content">
    @php(the_content())

    <h4 class="tags-title">TOPICS:</h4>
    @php(the_tags( '<button class="green-button">', '</button><button class="green-button">', '</button>' ))
    <hr>

    <div class="entry-content__notes">
      <p>@php(the_field('credits_and_notes'))</p>
    </div>

    <div class="entry-social-links">

      <div class="facebook-link" href="facebook.com"><img src="wp-content/themes/cmp/assets/images/small-facebook.png">Facebook</div>
      <div class="twitter-link" href="twitter.com"><img src="wp-content/themes/cmp/assets/images/small-twitter.png">Twitter</div>
      <div class="print-link" href="#"><img src="wp-content/themes/cmp/assets/images/small-printer.png">Print</div>
      <div class="more-link" href="#"><img src="wp-content/themes/cmp/assets/images/small-plus.png">More</div>

    </div>

    <a class="download-pdf" href="?p={{get_the_ID()}}&format=pdf">Download PDF<img src="wp-content/themes/cmp/assets/images/pdf-icon.svg"></a>

</div>

    <div class="section-hr">

      <hr>
      <div class="section-hr__h5">
        <h5>You Might Also Like</h5>
      </div>

    </div>

<div class="entry-content">

    <div class="recent-articles-container">

      <?php query_posts( array ( 'category_name' => 'Featured Articles', 'posts_per_page => 3', 'post__not_in' => array( $post->ID ), 'post__not_in' => array( 83 )) );
        while ( have_posts() ) : the_post(); ?>

      <div class="article">

        <img src="<?php the_field('featured_image') ?>">

        <div class="article__text-box">
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <p><?php the_field('summary') ?></p>
        </div>

      </div>

      <hr>

      <?php endwhile;
        wp_reset_query();
      ?>

  </div>

  <div class="more-articles-container">
    <button class="green-button more-articles">More Articles</button>
  </div>

  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>


</article>
