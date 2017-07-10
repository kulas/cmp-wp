{{--
  Template Name: Event Spaces Gallery
--}}

<div class="event-spaces-gallery">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="content-container">

    <div class="nav-breadcrumb">

      <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
      ?>

    </div>

      <div class="spaces">

        <?php if( have_rows('event_space') ): while ( have_rows('event_space') ) : the_row(); ?>

          <div class="event-space">

                <div class="event-space__image-container">
                  <img src="{{ the_sub_field('image') }}" />
                </div>

                <h2>{{ the_sub_field('name') }}</h2>

          </div>

        <?php endwhile; else : endif; ?>

      </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
