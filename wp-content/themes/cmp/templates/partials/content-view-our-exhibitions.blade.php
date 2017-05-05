{{--
  Template Name: View Our Exhibitions
--}}
<div id="view-our-exhibitions">

  <img src="{{ the_field('view_our_exhibitions_header') }}" />

  <div class='section-hr'>
    <hr><div class='section-hr__h5'>
      <h5>View Our Exhibitions</h5>
    </div>
  </div>

  <div class="content-container">

    <p>{{ the_field('view_our_exhibitions_intro') }}</p>

    <div class="museum-container">

      <div class="museum">
          <img src="{{ the_field('cmoa_image') }}">
          <a href="http://cmoa.org/">
            <h3>Carnegie Museum of Art</h3>
          </a>
          <p>{{ the_field('cmoa_description') }}</p>
      </div>

      <div class="museum">
          <img src="{{ the_field('cmnh_image') }}">

          <a href="http://www.carnegiemnh.org/">
            <h3>Carnegie Museum of Natural History</h3>
          </a>
          <p>{{ the_field('cmnh_description') }}</p>
      </div>

      <div class="museum">
          <img src="{{ the_field('csc_image') }}">
          <a href="http://www.carnegiesciencecenter.org/">
            <h3>Carnegie Science Center</h3>
          </a>
          <p>{{ the_field('csc_description') }}</p>
      </div>

      <div class="museum">
          <img src="{{ the_field('warhol_image') }}">
          <a href="http://www.warhol.org/">
            <h3>The Andy Warhol Museum</h3>
          </a>
          <p>{{ the_field('warhol_description') }}</p>
      </div>

    </div>

  </div>

</div>
