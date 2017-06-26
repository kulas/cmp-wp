{{--
  Template Name: Event Spaces Gallery Description
--}}

<div class="event-spaces-gallery">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="content-container">

      <div class="spaces">

        <?php if( have_rows('event_space') ): while ( have_rows('event_space') ) : the_row(); ?>

          <div class="event-space">

              <a class="event-space__image-container" style="background-image:url('{{ the_sub_field('image') }}')" href="">
                <div class="event-space__description">
                  {{ the_sub_field('detailed_description') }}
                </div>
              </a>
              <h2>{{ the_sub_field('name') }}</h2>

          </div>

        <?php endwhile; else : endif; ?>

      </div>

    </div>

  <?php endwhile; else: endif; ?>

</div>
