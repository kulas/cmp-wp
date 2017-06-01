{{--
  Template Name: Basic Template With Header
--}}

<div class="basic-header">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="hero-image" style="background-image:url('{{ the_field('header_image') }}')">
    <h1>{{ the_title() }}</h1>
  </div>

  <div class="content-container">

  <div class="nav-breadcrumb">

    <?php if(function_exists('bcn_display'))
      {
          bcn_display();
      }
    ?>

  </div>

  <hr>

    <div class="main-text">
      {{ the_content() }}
    </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
