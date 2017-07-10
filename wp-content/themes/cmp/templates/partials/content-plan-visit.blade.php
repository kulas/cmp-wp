{{--
  Template Name: Plan a Visit
--}}

<div class="plan-visit">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="hero-header" style="background-image:url('{{ the_field('header_image') }}')"></div>

  <div class="content-container">

    <h1 class="hero-header__words-box">{{ the_title() }}</h1>

    <div class="museum-container">

      <?php if( have_rows('museum_details') ): while ( have_rows('museum_details') ) : the_row() ?>

          <div class="museum-container__museum">

            {{ the_sub_field('museum_details') }}

          </div>

      <?php endwhile; else : endif; ?>

    </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
