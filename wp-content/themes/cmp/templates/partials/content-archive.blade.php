{{--
  Carnegie Magazine Archives Page
--}}

<div class="content-container">
  <div class="magazine-archive">
    <div class="issue">
      <div class="text">
        @php
          if ( have_posts() ) :
          while ( have_posts() ) :
          the_post();
        @endphp

        {{ the_content() }}

        @php
          endwhile; else: endif;
        @endphp
      </div>
    </div>
  </div>
</div>
