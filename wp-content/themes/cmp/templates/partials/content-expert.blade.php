<div class="expert">
  <div class="expert__photo">
    @php
      $image = get_field('bio_photo');
      if( !empty($image) ):
    @endphp
      <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
    @php
      endif;
    @endphp
  </div>
  <h4 class="expert__name">{{ the_title() }}</h4>
  <div class="expert__details">
    <h5>{{ the_field('position')}}</h5>
    <p>
      <strong>Areas of focus:</strong>
      <span class="expert__focus">{{ the_field('area_of_focus') }}</span>
    </p>
    {{ the_content() }}
  </div>
</div>
