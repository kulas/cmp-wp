{{--
  Template Name: Carnegie Magazine Current Issue Section 2
--}}

<div class="carnegie-magazine-current-1 carnegie-magazine-current-2">
  <div class="content-container">

    <h2 class="robot-uppercase">Features</h2>
    <hr/>

    <div class="features">

      <?php
        global $post;
        if( have_rows('featured_articles') ): ?>
        <?php while ( have_rows('featured_articles') ) : the_row(); ?>
          <?php $post_object = get_sub_field('article'); ?>
            <?php if( $post_object ): ?>
              <?php $post = $post_object; setup_postdata( $post ); ?>

                <div class="article">
                  <div class="categories">{{ the_category( ' | ' ) }}</div>
                  <div class="article__image-container">
                    <img src="{{ the_field('square_image') }}">
                  </div>
                  <a href="{{ the_permalink() }}">
                    <h3 class="green-robot-link">{{ the_title() }}</h3>
                  </a>
                  <p>{{ the_excerpt() }}</p>
                  <p class="author">By {{ the_field('author') }}</p>
                </div>

              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>
