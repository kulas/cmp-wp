{{-- Template Name: Carnegie Magazine Section 4 --}}

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="carnegie-magazine__big-picture">
    <div class="hero-header" style="background-image:url('{{ the_field('big_picture_image') }}')"></div>
    <div class="content-container">
      <h1 class="hero-header__words-box">Big Picture</h1>
      <p>{{ the_field('big_picture_text') }}</p>

      <div class="magazine-signup">
        <p class="uppercase-robot">Sign up to receive more stories in your email</h3><br>
        <button class="grey-button">Enter Your Email</button>
      </div>

    </div>

  </div>

<?php endwhile; else: endif; ?>
