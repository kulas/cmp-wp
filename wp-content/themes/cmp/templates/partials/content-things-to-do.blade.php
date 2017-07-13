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

      <?php if( have_rows('activity') ): while ( have_rows('activity') ) : the_row(); ?>

        <div class="activity">

          <div class="activity__image-container">
            <img class="activity__main-image" src="<?php the_sub_field('featured_image') ?>">
          </div>

              <img class="activity__square-image" src="<?php the_sub_field('square_image') ?>">

              <div class="activity__text-box">
                <h4><a href="<?php the_sub_field('link') ?>"><?php the_sub_field('title') ?></a></h4>
                <p><?php the_sub_field('summary') ?></p>
              </div>

        </div>

        <hr class="activity__hr" />

      <?php endwhile; else : endif; ?>

      <button class="green-button more-things">More Things To Do</button>

    </div>

  </div>

</div>
