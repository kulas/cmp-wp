{{--
  Template Name: Plan a Visit
--}}

<div class="basic-header">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  {{-- <div class="hero-header" style="background-image:url('{{ the_field('header_image') }}')">
    <h1>{{ the_title() }}</h1>
  </div> --}}

  <div class="content-container">

    <div class="main-text">
      {{ the_content() }}
    </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
