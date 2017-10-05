{{-- Basic Page Template With Header Custom Header Field --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();

  $image = get_field('header_image');
  $image_id = $image['id'];
  $image_url = $image['url'];
  $image_credit = get_media_credit_html($image_id);

@endphp

<div class="basic-header">
  <div class="hero-header" role="img" aria-label="{{ the_title() }}" style="background-image:url('{{ $image_url }}')">
    <p class="media-credit">@php echo $image_credit; @endphp</p>
  </div>
  <div class="content-container">
    <h1 class="hero-header__words-box">{{ the_title() }} </h1>
    <hr class="breadcrumb-hr">
    <div class="content-wrapper">
      <div class="l-long">
        {{ the_content() }}
        @php
          $terms = get_terms( array(
            'post_type' => 'expert',
            'taxonomy' => 'museums',
            'hide_empty' => true,
            'orderby' => 'name'
          ));
          foreach($terms as $term):
        @endphp
        <div class="expert-list">
          <h3 class="expert-list__museum">{{ $term->name }}</h3>
          @php
            $expert_args = array(
              'post_type'   => 'expert',
              'post_status' => 'publish',
              'orderby'     => 'name',
              'tax_query' => array(
                array(
                  'taxonomy' => 'museums',
                  'terms' => $term->term_id
                )
              )
            );
            $experts = new \WP_Query($expert_args);
           @endphp

          @php
            while($experts->have_posts()):
            $experts->the_post();
          @endphp
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
                  <strong>Area of focus:</strong>
                  <span class="expert__focus">{{ the_field('area_of_focus') }}</span>
                </p>
              </div>
            </div>
          @php
            endwhile; wp_reset_postdata();
          @endphp
        </div>
        @php
          endforeach;
        @endphp
      </div>
      <div class="l-short">
        @php
          if( have_rows('sidebar_content') ):
          while( have_rows('sidebar_content') ):
          the_row();
        @endphp
        <h3>{{ the_sub_field('heading') }}</h3>
        {{ the_sub_field('text') }}
        @php
          endwhile; endif;
        @endphp
      </div>
    </div>
    @include('partials.tabs')
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
