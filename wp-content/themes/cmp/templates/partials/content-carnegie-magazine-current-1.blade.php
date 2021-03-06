{{--
  Template Name: Carnegie Magazine Current Issue Section 1
--}}

<div class="carnegie-magazine-current-1">
  <div class="content-container">
    <div class="current-issue">
      <div class="current-issue__left">
        <img src="{{ the_field('current_issue_cover') }}" alt="{{ the_field('current_issue_title') }}">
      </div>
      <div class="current-issue__right">

        {{-- This gets the cover story custom field for this issue --}}
        @php
          global $post;
          $post_object = get_field('cover_story');
          if( $post_object ):
          $post = $post_object;
          setup_postdata( $post );
        @endphp

        <div class="current-issue__cover-story">
          <h2 class="issue-title">{{ the_field('current_issue_title') }}</h2>
          <p class="small-uppercase--bold">Cover Story</p>
          <h3 class="sans-serif"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
          <p>{{ the_field('quote') }}</p>
          <p class="author">{{ the_field('author') }}</p>
        </div>

        @php
          wp_reset_postdata(); endif; // Resets postdata for cover story
        @endphp

        <div class="magazine-archives">
          <p class="uppercase-bold center">Magazine Archives</p>
            <div class="magazine-archives__container">

              @php
                if( have_rows('recent_issues') ): while ( have_rows('recent_issues') ) : the_row() // Gets the recent issues custom field.
              @endphp

                <div class="archive">
                  <a href="{{ the_sub_field('issue_link') }}">
                    <img src="{{ the_sub_field('cover_photo') }}" alt="{{ the_sub_field('issue_title') }}">
                    <p class="small-uppercase--bold center">{{ the_sub_field('issue_title') }}</p>
                  </a>
                </div>

              @php
            endwhile; else : endif; // End recent issues
              @endphp

            </div>

            <a class="green-button" style="display: block; text-align:center;" href="/carnegie-magazine/carnegie-magazine-archive">More Archives</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
