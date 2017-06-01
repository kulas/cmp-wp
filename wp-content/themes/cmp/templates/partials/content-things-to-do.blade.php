{{--
  Template Name: Things To Do
--}}

<div id="things-to-do" class="section--primary">

  <div class="section-hr">
    <hr>
    <div class="section-hr__h5">
      <h5>Things to Do</h5>
    </div>
  </div>

  <div class="content-container">

    <div class="activity-container">

      <?php query_posts( array ( 'category_name' => 'Things To Do', 'posts_per_page => 4') );
        while ( have_posts() ) : the_post(); ?>

        <div class="activity">

              <img class="activity__main-image" src="<?php the_field('featured_image') ?>">
              <img class="activity__square-image" src="<?php the_field('square_image') ?>">

              <div class="activity__text-box">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p><?php the_field('summary') ?></p>
              </div>
        </div>

        <hr class="activity__hr" />

      <?php endwhile;
        wp_reset_query();
      ?>

      <button class="green-button more-things">More Things To Do</button>

    </div>

  </div>

</div>
