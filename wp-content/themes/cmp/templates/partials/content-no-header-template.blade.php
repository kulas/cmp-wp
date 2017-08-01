{{-- basic template with no header & has breadcrumb--}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="no-header">

  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }}</h1>
  <div class="breadcrumb-container">
    <div class="nav-breadcrumb">

      @php if(function_exists('bcn_display')) // breadcrumb
        {
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
