{{-- Things to do subcategory alt (allows for slightly different formatting of pages) --}}

<div class="things-to-do-subcategory">
  <div class="content-container">
    <div class="large-title">
      <h1>{{ the_title() }}</h1>
    </div>

    <div class="nav-breadcrumb">

      @php
      if(function_exists('bcn_display')) // breadcrumb
        {
            bcn_display();
        }
      @endphp

    </div>
    <hr>
    <div class="activity-container">

      @php //activity slash sub-page repeater
        if( have_rows('activity') ):
         while ( have_rows('activity') ) : the_row()
      @endphp

      <div class="activity">
        <div class="activity__image" role="img" style="background-image:url('{{ the_sub_field('image') }}')"></div>
          <h3>{{ the_sub_field('title') }}</h3>
        </a>
        <p>{{ the_sub_field('description') }}</p>
      </div>

      @php
        endwhile; else : endif;
      @endphp

    </div>
  </div>
</div>
