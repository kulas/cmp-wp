{{--
  Template Name: Member Events
--}}

<div class="member-events">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="hero-header" style="background-image:url('{{ the_field('header_image') }}')"></div>

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

      {{ the_content() }}

</div>
