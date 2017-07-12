{{-- Template Name: Carnegie Magazine Featured Articles --}}

{{-- Main featured/hero article --}}

<?php
  global $post;
  $post_object = get_field('main_featured_article');
  if( $post_object ):
  $post = $post_object;
  setup_postdata( $post );
?>

<div class="hero-header" style="background-image:url({{ the_field('featured_image') }})">
</div>

<div class="magazine-featured-articles">

  <div class="magazine-featured-articles__main">
    <div class="content-container">
      <div class="main-article-content">
        <a href="{{ the_permalink() }}">
          <h1>{{ the_title() }}</h1>
        </a>
        <p class="main-article-content__excerpt">{{ the_excerpt() }}</p>
        <p class="author">By {{ the_field('author') }}</p>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endif; ?>
      </div>
      <hr />

      <h2 class="subheader">Featured Stories</h2>

      {{-- Secondary article section --}}
      {{-- all this confusion loops through a repeater for post objects --}}
      <div class="featured-stories">

      <?php if( have_rows('secondary_featured_articles') ): ?>
        <?php while ( have_rows('secondary_featured_articles') ) : the_row(); ?>
          <?php $post_object = get_sub_field('article'); ?>
            <?php if( $post_object ): ?>
              <?php $post = $post_object; setup_postdata( $post ); ?>

                <div class="article">
                  @php(the_tags( '', ' | ', '' ))
                  <div class="article__image-container">
                    <img src="{{ the_field('featured_image') }}">
                  </div>
                  <a href="{{ the_permalink() }}">
                    <h3>{{ the_title() }}</h3>
                  </a>
                  <p>{{ the_excerpt() }}</p>
                  <p class="author">By {{ the_field('author') }}</p>

                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
            <hr />
          </div>
        <?php endif; ?>

    </div>

    {{-- 3rd featured article section  --}}

    <div class="magazine-featured-articles__section-3">

      <?php if( have_rows('featured_articles_3') ): ?>
        <?php while ( have_rows('featured_articles_3') ) : the_row(); ?>
          <?php $post_object = get_sub_field('article'); ?>
            <?php if( $post_object ): ?>
              <?php $post = $post_object; setup_postdata( $post ); ?>

                <div class="article">
                  {{ the_category(' | ') }}
                  <div class="article__image-container">
                    <img src="{{ the_field('featured_image') }}">
                  </div>
                  <a href="{{ the_permalink() }}">
                    <h3>{{ the_title() }}</h3>
                  </a>
                  <p>{{ the_excerpt() }}</p>
                  <p class="author">By {{ the_field('author') }}</p>

                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>

    <div class="magazine-featured-articles__sidebar">

      <h3>Current Issue</h3>

      <div class="magazine-featured-articles__sidebar__container">

        <img src={{ the_field('current_issue') }} />
        <h3>Sign up<br /> to receive<br /> more stories<br /> in your email</h3>
        <button class="grey-button">Enter Your Email</button>

        <div class="most-read-articles">

          <?php if( have_rows('sidebar_articles') ): ?>
            <?php while ( have_rows('sidebar_articles') ) : the_row(); ?>
              <?php $post_object = get_sub_field('article'); ?>
                <?php if( $post_object ): ?>
                  <?php $post = $post_object; setup_postdata( $post ); ?>

                    <div class="article">
                      {{ the_category(' | ') }}
                      <div class="article__image-container">
                        <img src="{{ the_field('featured_image') }}">
                      </div>
                      <a href="{{ the_permalink() }}">
                        <h3 class="article__title">{{ the_title() }}</h3>
                      </a>
                      <p>{{ the_excerpt() }}</p>
                      <p class="author">By {{ the_field('author') }}</p>

                      <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</div>
