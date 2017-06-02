{{--
  Template Name: Featured Exhibits
--}}


<div id="featured-exhibits">

<div class='section-hr small-only'>
  <hr/>
  <div class='section-hr__h5'>
    <h5>Now Showing</h5>
  </div>
</div>


<?php $count = 1; ?>

<?php if( have_rows('exhibit') ):

 	// loop through the rows of data
  while ( have_rows('exhibit') ) : the_row();

  // hero block
  if ($count==1) {
    ?>
        <div class="hero-header" style="background-image: url({{ the_sub_field('exhibit_image') }})"></div>
        <div class='exhibit-container exhibit--hero'>
          <div class="exhibit__preview">

            <div class="exhibit-preview__summary">

              <h2 class="hero-header__words-box button--link">
                <a href="{{ the_sub_field('link') }}">{{ the_sub_field('title') }}</a>

              </h2>

              <div class="exhibit-preview__dates">
                  <p class="start-date">{{ the_sub_field('dates') }}</p>
              </div>

              <div class="exhibit-preview__summary-text">{{ the_sub_field('summary') }}</div>

            </div>

          </div>
      </div>
    <?php
  }

  if ($count==2) {
  ?>
    <div class='section-hr large-only'><hr><div class='section-hr__h5'><h5>Now Showing</h5></div></div>
    <div class='exhibit-container'>
  <?php
  }

  // callout blocks
  if ($count >= 2) {
  ?>
    <div class='exhibit'>
      <div class="exhibit__image" style="background-image: url({{ the_sub_field('exhibit_image') }})">
      </div>

      <div class="exhibit__preview">

        <div class="exhibit-preview__summary">

          <div class="exhibit__words-box">

            <div class="exhibit-preview__dates">

                <p class="start-date">{{ the_sub_field('dates') }}</p>

            </div>

            <a href="{{ the_sub_field('link') }}">
              <h1 class="exhibit-preview__title button--link">
                {{ the_sub_field('title') }}
              </h1>
            </a>

            <div class="exhibit-preview__summary-text">{{ the_sub_field('summary') }}</div>

          </div>

        </div>

      </div>

  </div>

<?php
}
?>



<?php if ($count==6)
    echo "</div>" ?>


<?php $count += 1 ?>
<?php endwhile; else : endif; ?>

</div>
