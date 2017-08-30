{{-- Homepage Featured Exhibits/Now Showing section --}}

<div id="featured-exhibits">
  <div class='section-hr small-only'>
    <hr/>
    <div class='section-hr__h5'>
      <h5>Now Showing</h5>
    </div>
  </div>

  @php //This fun thing randomizes the order of the featured exhibits, so a different one is the hero image/exhibit each page refresh.
    $count = 0;
    $exhibits = get_field('exhibit'); //get all rows
    shuffle ($exhibits); //randomize rows
    if( have_rows('exhibit') ):
    while ( have_rows('exhibit') ) :
    the_row();
    $exhibit = $exhibits[$count];

    if ($count==0) { // The first exhibit is the hero image/main featured exhibit.

    $image = $exhibit['exhibit_image']; //gets full image array
    $image_url = $image['url']; //url of image
    $image_id = $image['id']; //id of image
    $image_credit = get_media_credit_html($image_id); //media credit for image
  @endphp

    <a href="{{ $exhibit['link'] }}">
      <div class="hero-header" style="background-image: url({{ $image_url }})">
        <p class="media-credit">@php echo $image_credit; @endphp</p>
      </div>
    </a>
      <div class='exhibit-container exhibit--hero'>
        <div class="exhibit__preview">
          <div class="exhibit-preview__summary">
            <h2 class="hero-header__words-box button--link">
              <a href="{{ $exhibit['link'] }}" aria-label="{{ $exhibit['title'] }}">
                {{ $exhibit['title'] }}
              </a>
            </h2>
            <div class="exhibit-preview__dates">
                <p class="start-date">{{ $exhibit['dates'] }}</p>
            </div>
            <p class="exhibit-preview__summary-text">
              {{ $exhibit['summary'] }}
            </p>
          </div>
        </div>
    </div>

    @php
      }
      if ($count==1) { // Displays 'Now Showing' hr after the featured exhibit.
    @endphp

    <div class='section-hr large-only'><hr>
      <div class='section-hr__h5'>
        <h5 class="robot--green">Now Showing</h5>
      </div>
    </div>
    <div class='exhibit-container'>

    @php
      }
      if ($count >= 1) {
    @endphp

    {{-- Callout blocks/4 featutred exhibits --}}
    <div class='exhibit'>
      <a aria-label="{{$exhibit['title']}}" href="{{ $exhibit['link'] }}" >
        <div class="exhibit__image" style="background-image: url({{ $exhibit['exhibit_image']['url'] }})">
          <div class="exhibit-preview__dates">
            <p class="start-date">{{ $exhibit['dates'] }}</p>
          </div>
        </div>
      </a>
        <div class="exhibit__preview">
          <div class="exhibit-preview__summary">
            <div class="exhibit__words-box">
              <a class="black-link" href="{{ $exhibit['link'] }}">
                <h2 class="exhibit-preview__title button--link">
                  {{ $exhibit['title'] }}
                </h2>
              </a>
              <p class="exhibit-preview__summary-text">
                {{ $exhibit['summary'] }}
              </p>
            </div>
          </div>
        </div>
      </div>

  @php
    }
    if ($count > 5) // Ends the featured callout block/featuerd exhibit section after 4 blocks.
    echo "</div>";
    $count = $count + 1;
    endwhile; else : endif;
  @endphp

</div>
