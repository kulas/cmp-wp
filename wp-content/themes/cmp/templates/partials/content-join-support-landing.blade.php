{{--
  Template Name: Join Support Landing Page
--}}

<div class="things-to-do-page">

    <?php
    $rows = get_field('hero_images'); //get all rows
    shuffle ($rows); //randomize rows
    $row = $rows[0]; ?>

    <div class="hero-header" style="background-image:url('{{ $row['hero_image'] }}')">
    </div>

  <div class="content-container">
    <div>
      <h1 class="hero-header__words-box">{{ the_title() }}</h1>
    </div>
  </div>

  <div class="content-container">
    
    <div class="text-box">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post() ?>

         {{ the_content() }}

      <?php endwhile; else : endif; ?>

    </div>

  <hr>

  <?php if( have_rows('activity') ): while ( have_rows('activity') ) : the_row() ?>

      <div class="activity">

        <a href="{{ the_sub_field('external_link') }} {{ the_sub_field('internal_link') }}">
          <div class="activity__image" style="background-image:url('{{ the_sub_field('image') }}')">
            <div class="activity__title">
                <h3>{{ the_sub_field('title') }}</h3>
            </div>
        </div>
      </a>

      <p>{{ the_sub_field('description') }}</p>

      </div>

      <?php endwhile; else : endif; ?>

  </div>

</div>
