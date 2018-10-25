{{-- Great Event Spaces gallery with hover-over description --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="content-container item-grid">
  @php
    if( have_rows('event_space') ): // Loops through Event Space custom field repeater
    while ( have_rows('event_space') ) :
    the_row();

    $image_url = get_sub_field('image');
    $image_id = App\get_image_from_url($image_url);
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
  @endphp

    <div class="activity">
      <div class="activity__image tall" role="img" aria-label="{{ $image_alt }}" style="background-image:url('{{ $image_url }}')">
        <div class="activity__title">
          <h3>{{ the_sub_field('name') }}</h3>
        </div>
      </div>
      {{ the_sub_field('detailed_description') }}
    </div>

  @php
    endwhile; else : endif;
  @endphp
</div>

@php
  endwhile; else : endif;
@endphp
