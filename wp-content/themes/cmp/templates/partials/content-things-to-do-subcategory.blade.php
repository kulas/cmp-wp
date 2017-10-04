{{-- Things to Do Subcategory --}}

<div class="things-to-do-subcategory">
  <div class="content-container">
    <div class="large-title">
      <h1>{{ the_title() }}</h1>
    </div>
    <div class="nav-breadcrumb">

      @php
        if(function_exists('bcn_display'))
          {
              bcn_display();
          }
      @endphp

    </div>
    <hr>
  </div>
  <div class="content-container item-grid">

    @php
      if( have_rows('activity') ):
      while ( have_rows('activity') ) :
      the_row();
    @endphp

    <div class="activity">
      <a href="{{ the_sub_field('external_link') }} {{ the_sub_field('internal_link') }}">
        <div class="activity__image" role="img" style="background-image:url('{{ the_sub_field('image') }}')">
          <div class="activity__title">
            <h3>{{ the_sub_field('title') }}</h3>
          </div>
        </div>
      </a>
     {{ the_sub_field('description') }}
    </div>

    @php
      endwhile; else : endif;
    @endphp

  </div>
</div>
