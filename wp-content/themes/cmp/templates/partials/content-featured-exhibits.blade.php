{{--
  Template Name: Featured Exhibits
--}}

<div id="featured-exhibits">

<div class='section-hr-mobile'>
  <hr><div class='section-hr__h5'>
    <h5>Now Showing</h5>
  </div>
</div>

<?php $count = 1; ?>

<?php if( have_rows('exhibit') ):

 	// loop through the rows of data
  while ( have_rows('exhibit') ) : the_row();

  if ($count==1) {
    echo "<div id='exhibit-header' class='exhibit-header exhibit'>";
  }

  if ($count==2) {
    echo "<div class='content-container'>";
  }

  if ($count >= 2) {
    echo "<div class='exhibit'>"; } ?>

    <div class="exhibit__image" style="background-image: url({{ the_sub_field('exhibit_image') }})">

    </div>

    <div class="exhibit__preview">

      <div class="exhibit-preview__summary">

        <div class="exhibit__words-box">

          <div class="exhibit-preview__dates">

              <p class="start-date">{{ the_sub_field('dates') }}</p>

          </div>

          <a href="{{ the_sub_field('link') }}">
            <h1 class="exhibit-preview__title">
              {{ the_sub_field('title') }}
              <img class="exhibit__learn-more-arrow" src="/wp-content/themes/cmp/assets/images/learnmore-arrow.svg"></a>
            </h1>
          </a>

          <div class="exhibit-preview__summary-text">{{ the_sub_field('summary') }}</div>

        </div>

      <?php if ($count==1)
          echo "<div class='section-hr'><hr><div class='section-hr__h5'><h5>Now Showing</h5></div></div>" ?>

      </div>

    </div>

  </div>

<?php if ($count < 2)
  echo "</div>" ?>

<?php $count += 1 ?>

<?php if ($count==6)
    echo "</div>" ?>

<?php endwhile; else : endif; ?>

</div>
