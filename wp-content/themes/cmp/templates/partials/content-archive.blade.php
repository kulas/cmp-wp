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

      {{-- Obtains list of recently Archived magazine issues, loops through these issues to show cover story + blurb --}}
      @php
        $child_pages = new WP_Query( array(
          'post_type'      => 'page', // set the post type to page
          'posts_per_page' => 10, // number of posts (pages) to show
          'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
          'cat'  => 33 // ensures only archive issues show up
        ));

        if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
      @endphp

      <div class="issue__cover">
        <img src="{{ the_field('current_issue_cover') }}" alt="{{ the_field('current_issue_title') }}">
      </div>

      <div class="issue__content">
        <a href="{{ the_permalink() }}"><h2 class="black-link">{{ the_title() }}</h2></a>
        <p class="small-uppercase--bold">Cover Story</p>

        {{-- Finds the information on the 'cover story' post for the relevant issue --}}
          @php
            global $post;
            $post_object = get_field('cover_story');
            if( $post_object ):
            $post = $post_object;
            setup_postdata( $post );
          @endphp

            <div class="tags">@php(the_tags( '', ' | ', '' ))</div>
              <a href="{{ the_permalink() }}">
                <h2 class="black-link robot">{{ the_title() }}</h2>
              </a>
              <p>{{ the_excerpt() }}</p>
              <p class="author">{{ the_field('author') }}</p>

          {{-- Resets postdata on the cover story for the issue --}}
          @php wp_reset_postdata(); endif; @endphp

      </div>

      @php
        endwhile; endif; //resets postdata for the issue.
        wp_reset_postdata();
      @endphp

    </div>

    <div class="archive__sidebar">
      <div class="archive__sidebar__container">
        <h3 class="uppercase">Past Issues</h3>
        <ul>

          @php
            // Loops through recent issues for the sidebar
            $child_pages = new WP_Query( array(
              'post_type'      => 'page', // set the post type to page
              'posts_per_page' => 10, // number of posts (pages) to show
              'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop3
              'cat'  => 33 //ensures only archive issues show up
            ));
            if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
          @endphp

            <li>
              <a href="{{ the_permalink() }}">
                {{ the_title() }}
              </a>
            </li>

          @php
            endwhile; endif;
            wp_reset_postdata(); // Resets postdata for issue
          @endphp

        </ul>

        <a href="#">For earlier archives, click here.</a>

      </div>
    </div>
  </div>
</div>
