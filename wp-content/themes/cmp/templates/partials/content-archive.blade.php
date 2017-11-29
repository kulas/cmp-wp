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
        $issues = new WP_Query(array(
          'post_type'      => 'issue', // set the post type to issue
          'posts_per_page' => 10, // number of posts to show
          'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
          'orderby'        => 'meta_value',
          'meta_key'       => 'issue_number'
        ));

        if ( $issues->have_posts() ) : while ( $issues->have_posts() ) : $issues->the_post();
      @endphp

      <div class="issue__cover">
        {{ the_post_thumbnail('large') }}
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
            if ( $issues->have_posts() ) : while ( $issues->have_posts() ) : $issues->the_post();
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

        <!-- Eventually, this will link to the static HTML archives of older issues -->
        <!-- <a href="#">For earlier archives, click here.</a> -->
      </div>
    </div>
  </div>
</div>
