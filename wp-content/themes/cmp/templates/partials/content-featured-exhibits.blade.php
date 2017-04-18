{{--
  Template Name: Featured Exhibits
--}}

<div id="featured-exhibits">

<?php $count = 1; ?>

<?php query_posts( array ( 'category_name' => 'Featured Exhibits', 'posts_per_page => 5', 'orderby' => 'rand') );

  while ( have_posts() ) : the_post();

  if ($count==1)
    echo "<div class='hero-header'>" ?>

<?php if ($count==2)
    echo "<div class='content-container'>" ?>

  <div class="exhibit">

    <div class="exhibit__image" style="background-image: url(<?php the_field('exhibit_image'); ?>)">

    </div>

    <div class="exhibit__preview">

      <div class="exhibit-preview__summary">

        <div class="exhibit-preview__dates">

          <?php if( have_rows('exhibit_dates') ):
                while ( have_rows('exhibit_dates') ) : the_row(); ?>

                <div class="datespacer"></div>

                <p class="start-date"><?php the_sub_field('new_exhibit'); ?></p>

                <p class="start-date"><?php the_sub_field('exhibit_start_date'); ?></p><p class="end-date"><?php the_sub_field('exhibit_end_date'); ?></p>

        <?php endwhile;
          else :
          endif; ?>

        </div>

        <div class="words-box">

          <h1 class="exhibit-preview__title"><?php the_title(); ?></h1>
          <p><?php the_field('summary'); ?></p>

          <a href="<?php the_permalink(); ?>">Learn More &#x2197;</a>

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
