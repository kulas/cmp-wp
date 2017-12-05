{{--
  Carnegie Magazine Archives Page
--}}

@php
  global $post;

  if (have_posts()) : while (have_posts()) : the_post();

  $image = get_field('header_image');
  $image_id = $image['id'];
  $image_url = $image['url'];
  $image_credit = App\get_media_credit_html($image_id, false);

@endphp

@if ($image)
  <div class="basic-header">
    <div class="hero-header" role="img" aria-label="{{ the_title() }}" style="background-image:url('{{ $image_url }}')">
    </div>
    <div class="media-details">
      <p class="media-details__caption">@php echo $image['caption']; @endphp</p>
      <p class="media-details__credit">@php echo $image_credit; @endphp</p>
    </div>
  </div>
@endif

<div class="content-container">
  <h1 class="hero-header__words-box">{{ the_title() }}</h1>

  <div class="magazine-archive">
    <div class="issue">
      <div class="text">
        {{ the_content() }}
      </div>

      <div class="issues-row">
        @php
          $issues = new WP_Query(array(
            'post_type'      => 'issue', // set the post type to issue
            'posts_per_page' => -1, // include all issues
            'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
            'orderby'        => 'meta_value',
            'meta_key'       => 'issue_number',
            'meta_query'     => array(
              array(
                'key'   => 'issue_type',
                'value' => 'full'
              )
            )
          ));

          if ($issues->have_posts()) : while ($issues->have_posts()): $issues->the_post();
        @endphp

        <div class="issue__cover">
          <a href="{{ get_permalink() }}">
            <h2 class="black-link">{{ the_title() }}</h2>
            {{ the_post_thumbnail('large') }}
          </a>
        </div>

        @php
          endwhile; endif; //resets postdata for the issue.
          wp_reset_postdata();
        @endphp
      </div>

      @php
        $issues = get_posts(array(
          'post_type'      => 'issue', // set the post type to issue
          'posts_per_page' => -1, // include all issues
          'no_found_rows'  => true, // no pagination necessary so improve efficiency of loop
          'orderby'        => 'meta_value',
          'meta_key'       => 'issue_number',
          'meta_query'     => array(
            array(
              'key'   => 'issue_type',
              'value' => 'archived'
            )
          )
        ));
      @endphp

      @if (!empty($issues))
        @php
          // sort issues by year
          $issues_by_year = array();
          foreach ($issues as &$issue):
            $issue->issue_year = get_field('issue_year', $issue->ID) ?: 'Unknown';
            $issue->issue_season = get_field('issue_season', $issue->ID) ?: 'Unknown';

            if (!array_key_exists($issue->issue_year, $issues_by_year)):
              $issues_by_year[$issue->issue_year] = array();
            endif;

            // add issue to beginning so they display in chronological order
            array_unshift($issues_by_year[$issue->issue_year], $issue);
          endforeach;
        @endphp

        <h2 class="past-issues-heading">Past Issues</h2>

        <ol class="past-issues-list list--blank">
          @foreach ($issues_by_year as $year => $posts)
            <li>
              <h3 class="post-issues-year">{{ $year }}</h3>
              <ol class="list--inline">
                @foreach ($posts as $post)
                  @php(setup_postdata($post))
                  <li>
                    <a href="{{ get_permalink() }}">
                      {{ $post->issue_season }}
                    </a>
                  </li>
                @endforeach
              </ol>
            </li>
          @endforeach
          @php(wp_reset_postdata())
        </ul>
      @endif
    </div>
  </div>
</div>

@php
  endwhile; endif;
@endphp
