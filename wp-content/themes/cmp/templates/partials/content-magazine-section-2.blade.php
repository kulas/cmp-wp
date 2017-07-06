{{-- Template Name: Carnegie Magazine Section 2 --}}

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="carnegie-magazine-section-2">
      <div class="carnegie-magazine__big-picture">
        <div class="hero-header" style="background-image:url('{{ the_field('big_picture_image') }}')"></div>
        <div class="content-container">
          <h1 class="hero-header__words-box">Big Picture</h1>
          <p>{{ the_field('big_picture_text') }}</p>
          <hr />
        </div>
      </div>

      <div class="carnegie-magazine__facetime">
        <div class="content-container">
          <h2 class="facetime-title">Face Time</h2>

          <div class="facetime">

          <?php $count=1; ?>

            <?php
              if( have_rows('facetime') ): while ( have_rows('facetime') ) : the_row();
            ?>

              <?php if ($count==1) { ?>
                  <div class="facetime__left">
                    <div class="face">
                      <img src="{{ the_sub_field('image') }}">
                      <p class="facetime__left__name">{{ the_sub_field('name') }}</p>
                    </div>
                  </div>
              <?php } ?>

                  <?php if ($count==2) { ?>
                    <div class="facetime__right">
                  <?php } ?>

                    <?php if ($count >= 2) { ?>
                      <div class="face">
                        <img src="{{ the_sub_field('image') }}">
                        <p>{{ the_sub_field('name') }}</p>
                      </div>
                    <?php } ?>

                  <?php if ($count==4) { ?>
                    </div>
                  <?php } ?>

                <?php $count = $count + 1 ?>

              <?php endwhile; else : endif; ?>

            </div>
            <p class="facetime__text">{{ the_field('facetime_text') }}</p>

          </div>

        </div>

      </div>

    <?php endwhile; else: endif; ?>
