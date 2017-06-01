{{--
  Template Name: Event Spaces
--}}

<div class="event-spaces">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="hero-image" style="background-image:url('{{ the_field('header') }}')">
    <h1>{{ the_title() }}</h1>
  </div>

  <div class="content-container">

      <div class="main-text">
        {{ the_content() }}
      </div>

      <div class="spaces">

      <?php if( have_rows('event_space') ): while ( have_rows('event_space') ) : the_row(); ?>

        <div class="event-space">

            <a href="{{ the_sub_field('link') }}">

            <div class="event-space__image-container">
              <img src="{{ the_sub_field('image') }}" />
            </div>

            <h2>{{ the_sub_field('name') }}</h2>
            <p>{{ the_sub_field('description') }}</p>

          </a>

        </div>

      <?php endwhile; else : endif; ?>

      </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
