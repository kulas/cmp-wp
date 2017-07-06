{{-- Template Name: Carnegie Magazine Section 3 --}}

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="carnegie-magazine-section-3">

    <div class="carnegie-magazine__big-picture">
      <div class="hero-header" style="background-image:url('{{ the_field('inside_museums_image') }}')"></div>
      <div class="content-container">
        <h1 class="hero-header__words-box">Inside the Museums</h1>
        <p class="inside-museums-text">{{ the_field('inside_museums_text') }}</p>
      </div>
    </div>

  </div>

<?php endwhile; else: endif; ?>
