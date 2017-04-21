{{--
  Template Name: Featured Exhibits
--}}

<div id="featured-exhibits">

<div class='section-hr-mobile'>
  <hr><div class='section-hr__h5'>
    <h5>Now Showing</h5>
  </div>
</div>

<?php $count = 1; ?>

<?php query_posts( array ( 'category_name' => 'Featured Exhibits', 'posts_per_page => 6', 'orderby' => 'rand') );

  while ( have_posts() ) : the_post();

  if ($count==1) {
    echo "<div id='exhibit-header' class='exhibit-header exhibit'>";
  }

  if ($count==2) {
    echo "<div class='content-container'>";
  }

  if ($count >= 2) {
    echo "<div class='exhibit'>"; } ?>

    <div class="exhibit__image" style="background-image: url(<?php the_field('exhibit_image'); ?>)">

    </div>

    <div class="exhibit__preview">

      <div class="exhibit-preview__summary">

        <div class="exhibit__words-box">

          <div class="exhibit-preview__dates">

            <?php if( have_rows('exhibit_dates') ):
                  while ( have_rows('exhibit_dates') ) : the_row(); ?>

                      <p class="start-date"><?php the_sub_field('exhibit_start_date'); ?></p><p class="end-date"><?php the_sub_field('exhibit_end_date'); ?></p>

                      <p class="new-exhibit"><?php the_sub_field('new_exhibit'); ?></p>

          <?php endwhile;
            else :
            endif; ?>

          </div>

          <h1 class="exhibit-preview__title"><?php the_title(); ?></h1>
          <div class="exhibit-preview__summary-text"><?php the_field('summary'); ?></div>

          <a class="exhibit__learn-more" href="<?php the_permalink(); ?>">Learn More <img class="exhibit__learn-more-arrow" src="wp-content/themes/cmp/assets/images/learnmore-arrow.svg"></a>
          <a class="exhibit__learn-more-mobile" href="<?php the_permalink(); ?>"><img class="exhibit__learn-more-arrow" src="wp-content/themes/cmp/assets/images/learnmore-arrow.svg"></a>

        </div>

      <?php if ($count==1)
          echo "<div class='section-hr'><hr><div class='section-hr__h5'><h5>Now Showing</h5></div></div>" ?>

      </div>

    </div>

  </div>

<?php if ($count < 2)
  echo "</div>" ?>

<?php $count += 1 ?>

<?php if ($count==6)
    echo "</div>" ?>

<?php endwhile;
  wp_reset_query();
?>

</div>
