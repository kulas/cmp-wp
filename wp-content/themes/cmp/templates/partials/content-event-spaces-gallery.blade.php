{{--
  Template Name: Event Spaces Gallery
--}}

<div class="event-spaces-gallery">

  <div class="hero-image" style="background-image:url('{{ the_field('header') }}')">
    <h1>{{ the_title() }}</h1>
  </div>

  <div class="content-container">

      <div class="spaces">

        <?php if( have_rows('event_space') ): while ( have_rows('event_space') ) : the_row(); ?>

          <div class="event-space">

                <div class="event-space__image-container">
                  <img src="{{ the_sub_field('image') }}" />

                  <div class="event-space__description">
                    <h2>{{ the_sub_field('name') }}</h2>
                    <p>{{ the_sub_field('description') }}</p>
                  </div>
                </div>

            </div>

        <?php endwhile; else : endif; ?>

      </div>

  </div>

</div>
