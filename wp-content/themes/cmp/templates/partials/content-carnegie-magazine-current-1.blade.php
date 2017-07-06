{{--
  Template Name: Carnegie Magazine Current Issue Section 1
--}}

<div class="carnegie-magazine-current-1">
  <div class="content-container">

    <div class="current-issue">

      <div class="current-issue__left">
        <img src="{{ the_field('current_issue_cover') }}">
      </div>

      <div class="current-issue__right">

        <div class="current-issue__cover-story">
          <h2 class="issue-title">{{ the_field('current_issue_title') }}</h2>
          <p class="small-uppercase--bold">Cover Story</p>

            <?php
              global $post;
              $post_object = get_field('cover_story');
              if( $post_object ):
              $post = $post_object;
              setup_postdata( $post );
            ?>

              <p>{{ the_category() }}</p>

              <a href="{{ the_permalink() }}">
                <h2 class="green-robot-link">{{ the_title() }}</h2>
              </a>

              <p>{{ the_excerpt() }}</p>
              <p class="author">{{ the_field('author') }}</p>

            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>

        <div class="magazine-archives">
          <p class="uppercase-bold center">Magazine Archives</p>

            <div class="magazine-archives__container">

              <?php if( have_rows('recent_issues') ): while ( have_rows('recent_issues') ) : the_row() ?>

                <div class="archive">
                  <img src="{{ the_sub_field('cover_photo') }}">
                  <p class="small-uppercase--bold center">{{ the_sub_field('issue_title') }}</p>
                </div>

              <?php endwhile; else : endif;?>

            </div>

            <button class="green-button">More Archives</button>

          </div>

        </div>

      </div>
    </div>
  </div>
</div>
