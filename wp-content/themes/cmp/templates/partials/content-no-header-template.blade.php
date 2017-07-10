{{--
  Template Name: Basic Template With No Header
--}}

<div class="no-header">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="content-container">

    <h1 class="hero-header__words-box">{{ the_title() }}</h1>

  <div class="breadcrumb-container">

    <div class="nav-breadcrumb">

      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>

    </div>

  </div>

  <hr>

    <div class="main-text">
      {{ the_content() }}
    </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
