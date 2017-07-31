{{-- Carnegie Magazine Current Issue page "Big Picture" & Magazine subscription section --}}

@php
  if (have_posts()) :
  while (have_posts()) :
  the_post();
@endphp

<div class="carnegie-magazine__big-picture">
  <a href="{{ the_field('big_picture_link') }}">
    <div class="hero-header" style="background-image:url('{{ the_field('big_picture_image') }}')"></div>
    <div class="content-container">
      <h1 class="hero-header__words-box green-robot-link">{{ the_field('big_picture_title') }}</h1>
  </a>
    <p>{{ the_field('big_picture_text') }}</p>
    <div class="magazine-signup">
      <p class="uppercase-robot">Sign up to receive more stories in your email</h3><br>
      <button class="grey-button">Enter Your Email</button>
    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
