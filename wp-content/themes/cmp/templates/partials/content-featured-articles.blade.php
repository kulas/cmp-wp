{{--
  Template Name: Featured Articles
--}}
<div id="featured-articles">

  <div class="section-hr">

    <hr>
    <div class="section-hr__h5">
      <h5>Carnegie Magazine</h5>
    </div>

  </div>

  <?php query_posts( array ( 'category_name' => 'Main Featured Article', 'posts_per_page => 1') );
    while ( have_posts() ) : the_post(); ?>

  <div class="hero-header" style="background-image: url(<?php the_field('featured_image'); ?>)">
  </div>

  <div class="articles__featured-content">

  <div class="words-box">

    <h2 class="article__title"><?php the_title(); ?></h2>
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

    <?php endwhile;
      wp_reset_query();
    ?>

    <h3 class="featured-articles-h3">Featured Articles</h3>

    <div class="article-container">

    <?php query_posts( array ( 'category_name' => 'Featured Articles', 'posts_per_page => 4') );
      while ( have_posts() ) : the_post(); ?>

    <div class="article">

      <img src="<?php the_field('square_image') ?>">

      <div class="article__text-box">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php the_field('summary') ?></p>
      </div>

    </div>

    <?php endwhile;
      wp_reset_query();
    ?>

  </div>

</div>

</div>
