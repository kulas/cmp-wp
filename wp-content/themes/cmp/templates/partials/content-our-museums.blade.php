{{-- Our Museums--homepage section --}}

<div id="our-museums" class="section--primary">
  <div class="section-hr">
    <hr>
    <div class="section-hr__h5">
      <h5>Our Museums</h5>
    </div>
  </div>
    <div class="content-container">
      <div class="museum-container">
        @php
          if( have_rows('museum') ):
            while ( have_rows('museum') ) : the_row();
            $image = get_sub_field('museum_image');
        @endphp
          <div class="museum">
            <a class="black-link" href="{{ the_sub_field('musuem_link') }}">
              <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
              <h4>{{ the_sub_field('museum_name') }}</h4>
            </a>
          </div>
        @php
          endwhile; endif;
        @endphp
      </div>
    </div>
</div>
