{{-- Join and Support landing page with member quotes --}}

<div class="join-support">

  @php
    if ( have_posts() ) :
    while ( have_posts() ) :
    the_post();

    $rows = get_field('members'); // get all rows of member images
    shuffle ($rows); // shuffle member images
    $row = $rows[0];
  @endphp

  <div class="hero-header" style="background-image:url('{{ $row['image'] }}')"></div>
    <div class="content-container">
      <h1 class="hero-header__words-box">{{ the_title() }}</h1>
    </div>
    <div class="content-container">
      <div class="main-text">{{ the_content() }}</div>
      <hr>
        <div class="sub-pages">

          @php
            $i = 1; // part of image shuffling mechanism

            if( have_rows('sub-pages') ):
            while ( have_rows('sub-pages') ) :
            the_row()
          @endphp

            <div class="sub-page">
                <div class="sub-page__background" style="background-image:url('{{ $rows[$i]['image'] }}'">
                  <div class="sub-page__title">
                    <a href="{{ the_sub_field('link') }}">
                      <h3>{{ the_sub_field('title') }}</h3>
                    </a>
                  </div>
                  <h4 class="sub-page__quote">"{{ $rows[$i]['quote'] }}"</h4>
              </div>
            <p class="description">
              {{ the_sub_field('description') }}
            </p>
          </div>

        @php
          $i = $i+1;
          endwhile; else : endif;
        @endphp

      </div>
    </div>

  @php
    $i = $i+1;
    endwhile; else : endif;
  @endphp

</div>
