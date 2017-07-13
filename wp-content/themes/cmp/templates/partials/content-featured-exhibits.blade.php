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

<?php
  $count = 0;
  $exhibits = get_field('exhibit'); //get all rows
  shuffle ($exhibits); //randomize rows
?>

<?php if( have_rows('exhibit') ): while ( have_rows('exhibit') ) : the_row();

  $exhibit = $exhibits[$count];

  // hero block
  if ($count==0) {
    ?>
        <div class="hero-header" style="background-image: url({{ $exhibit['exhibit_image'] }})"></div>
        <div class='exhibit-container exhibit--hero'>
          <div class="exhibit__preview">

            <div class="exhibit-preview__summary">

              <h2 class="hero-header__words-box button--link">
                <a href="{{ $exhibit['link'] }}">{{ $exhibit['title'] }}</a>
              </h2>

              <div class="exhibit-preview__dates">
                  <p class="start-date">{{ $exhibit['dates'] }}</p>
              </div>

              <p class="exhibit-preview__summary-text">
                {{ $exhibit['summary'] }}
              </p>

            </div>

          </div>
      </div>
    <?php
  }

  if ($count==1) {
  ?>
    <div class='section-hr large-only'><hr><div class='section-hr__h5'><h5>Now Showing</h5></div></div>
    <div class='exhibit-container'>
  <?php
  }

  // callout blocks
  if ($count >= 1) {
  ?>
    <div class='exhibit'>
      <div class="exhibit__image" style="background-image: url({{ $exhibit['exhibit_image'] }})">
      </div>

      <div class="exhibit__preview">

        <div class="exhibit-preview__summary">

          <div class="exhibit__words-box">

            <div class="exhibit-preview__dates">

                <p class="start-date">{{ $exhibit['dates'] }}</p>

            </div>

            <a href="{{ $exhibit['link'] }}">
              <h1 class="exhibit-preview__title button--link">
                {{ $exhibit['title'] }}
              </h1>
            </a>

            <p class="exhibit-preview__summary-text">
              {{ $exhibit['summary'] }}
            </p>

          </div>

        </div>

      </div>

  </div>

<?php
}
?>

<?php if ($count > 5)
    echo "</div>" ?>

<?php $count = $count + 1 ?>

<?php endwhile; else : endif; ?>

</div>
