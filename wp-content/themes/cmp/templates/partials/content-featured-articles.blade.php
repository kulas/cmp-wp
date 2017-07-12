{{--
  Template Name: Featured Articles
--}}
<div id="featured-articles" class="section--primary">

  <div class="section-hr">

    <hr>
    <div class="section-hr__h5">
      <h5>Carnegie Magazine</h5>
    </div>

  </div>

  <?php
    global $post;
    $post_object = get_field('main_featured_article');
    if( $post_object ):
    $post = $post_object;
    setup_postdata( $post );
  ?>

  <div class="hero-header" style="background-image: url(<?php the_field('featured_image'); ?>)">
  </div>
  <div class="content-container">
    <h2 class="hero-header__words-box"><?php the_title(); ?></h2>
  </div>

  <div class="articles__featured-content container">

  <div class="words-box">

    <h3 class="article__author">by <?php the_author(); ?></h3>
    <h2 class="article__quote"><?php the_field('quote'); ?></h2>
    <h3 class="article__summary"><?php
				$excerpt = get_the_excerpt();
				$output = '<p>'.$excerpt.' <a href="'.get_permalink().'">Read Article ></a></p>';
				echo $output;
				?>
    </h3>

    <a href="<?php the_permalink(); ?>"><button id="article__button" class="green-button">Read the Article</button></a>

  </div>

  <hr class="magazine-hr">

  <div class="carnegie-magazine">

    <div class="carnegie-magazine__left-div">
      <img id="carnegie-magazine__cover" src="/wp-content/themes/cmp/assets/images/carnegie-magazine.png">
    </div>

    <div class="carnegie-magazine__right-div">
      <img id="carnegie-magazine__logo" src="/wp-content/themes/cmp/assets/images/carnegie-magazine-logo.png">
      <button class="green-button" href="http://www.carnegiemuseums.org/cmp/cmag/index.php">Read Current & Past Issues</button>
    </div>

  </div>

  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  <?php endif; ?>

    <h3 class="featured-articles-h3">Featured Articles</h3>

<div class="article-container">
  <?php if( have_rows('featured_articles') ): ?>
  <?php while ( have_rows('featured_articles') ) : the_row(); ?>
  <?php $post_object = get_sub_field('article'); ?>
  <?php if( $post_object ): ?>
  <?php $post = $post_object; setup_postdata( $post ); ?>

    <div class="article">

      <img src="<?php the_field('square_image') ?>">

      <div class="article__text-box">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php the_field('summary') ?></p>
      </div>

    </div>

    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>

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
