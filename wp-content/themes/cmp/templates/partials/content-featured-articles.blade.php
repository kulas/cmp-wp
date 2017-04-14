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

  <div class="words-box">

    <h2><?php the_field('summary'); ?></h2>

    <button class="green-button" href="<?php the_permalink(); ?>">Read the Article</button>

  </div>

    <?php endwhile;
      wp_reset_query();
    ?>

    <div class="content-container">

    <?php query_posts( array ( 'category_name' => 'Featured Articles', 'posts_per_page => 4') );
      while ( have_posts() ) : the_post(); ?>

    <div class="article">

      <img src="<?php the_field('featured_image') ?>">

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
