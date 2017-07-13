{{--
  Template Name: Carnegie Magazine Current Issue Section 3
--}}

<div class="carnegie-magazine-current-3">
  <div class="content-container">

    <div class="also-in-issue">

      <h2 class="robot-uppercase">Also in this Issue</h2>
      <hr/>

      <?php
        global $post;
        if( have_rows('also_in_issue') ): ?>
        <?php while ( have_rows('also_in_issue') ) : the_row(); ?>
          <?php $post_object = get_sub_field('article'); ?>
            <?php if( $post_object ): ?>
              <?php $post = $post_object; setup_postdata( $post ); ?>

                <div class="also-article">
                  <div class="also-article__left">
                    <div class="article__image-container">
                      <img src="{{ the_field('square_image') }}">
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

              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>

    </div>

  </div>
</div>
