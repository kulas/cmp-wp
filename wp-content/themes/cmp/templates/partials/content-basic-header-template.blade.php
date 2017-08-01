{{-- Basic Page Template With Header Custom Header Field --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();
@endphp

<div class="basic-header">
  <div class="hero-header" style="background-image:url('{{ the_field('header_image') }}')"></div>
    <div class="content-container">
      <h1 class="hero-header__words-box">{{ the_title() }}</h1>
      <div class="breadcrumb-container">
        <div class="nav-breadcrumb">

          @php //This displays the breadcrumb (e.g. Things to Do > Nights at the Museums)
            if (function_exists('bcn_display')) {
              bcn_display();
            }
          @endphp

    </div>
  </div>
  <hr>
    <div class="main-text">
      {{ the_content() }}
    </div>
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
