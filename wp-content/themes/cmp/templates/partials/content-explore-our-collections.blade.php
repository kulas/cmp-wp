{{--
  Template Name: Explore Our Collections
--}}

<div id="explore-our-collections">

  <img src="{{ the_field('explore_our_collections_header') }}" />

  <div class='section-hr'>
    <hr><div class='section-hr__h5'>
      <h5>Explore Our Collections</h5>
    </div>
  </div>

  <div class="content-container">

    <p>{{ the_field('explore_our_collections_description') }}</p>

    <div class="museum-container">

      <div class="museum">
          <div class="museum--image" style="background-image:url('<?php the_field('cmoa_collections_image')?>');">
          </div>
          <a href="http://cmoa.org/collection/">
            <h3>Carnegie Museum of Art</h3>
          </a>
          <p>{{ the_field('cmoa_collections_description') }}</p>

      </div>

      <hr class="mobile-hr" />

      <div class="museum">
        <div class="museum--image" style="background-image:url('<?php the_field('cmnh_collections_image')?>');">
        </div>
          <a href="http://carnegiemnh.org/science/default.aspx?id=8919">
            <h3>Carnegie Museum of Natural History</h3>
          </a>
          <p>{{ the_field('cmnh_collections_description') }}</p>
      </div>

      <hr class="mobile-hr" />

      <div class="museum">
        <div class="museum--image" style="background-image:url('<?php the_field('warhol_collections_image')?>');">
        </div>

          <a href="http://www.warhol.org/collection/">
            <h3>The Andy Warhol Museum</h3>
          </a>
          <p>{{ the_field('warhol_collections_description') }}</p>
      </div>

    </div>

  </div>

</div>
