{{--
Template Name: Learn With Us Category
--}}
<div class="learn-with-us-category">

  <div class="content-container">

    <div class="nav-breadcrumb">

    <?php if(function_exists('bcn_display'))
      {
          bcn_display();
      }
    ?>

    </div>

  <div class="large-title">

    <h1>{{ the_title() }}</h1>

  </div>

  <hr>

    <div class="activity-container">

      <?php if( have_rows('activity') ): while ( have_rows('activity') ) : the_row(); ?>

      <div class="activity">

        <img src="{{ the_sub_field('image') }}">
        <a href="{{ the_sub_field('link') }}">
          <h3>{{ the_sub_field('title') }} <img class="learn-more-arrow" src="wp-content/themes/cmp/assets/images/learnmore-arrow.svg"></h3>
        </a>
        <p>{{ the_sub_field('description') }}</p>

      </div>

      <?php endwhile; else : endif; ?>

    </div>

  </div>

</div>
