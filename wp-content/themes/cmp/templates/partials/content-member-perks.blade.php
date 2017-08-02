{{-- 4 horizontal sub-page links that appear on various join & support pages --}}

<div class="member-perks">
  <div class="content-container">
    <hr />
    <div class="sub-page-container">

      @php
        $count = 0 // Part of the counter
      @endphp

      @php // Has to be a separate block for some reason.
        if( have_rows('sub_page') ):
        while ( have_rows('sub_page') ) :
        the_row();
      @endphp

      <div class="sub-page">
        <a href="{{ the_sub_field('link') }}">
          <img class="sub-page__image" src="{{ the_sub_field('image') }}">
          <div class="sub-page__text-box">
            <h4>{{ the_sub_field('title') }}</h4>
          </div>
        </a>
      </div>

      @php
        $count = $count + 1; // This is weird but ensures only the 'Contact Us' section appears on the Membership landing page.
        if ($count > 3) {
          echo "</div>";
          echo "<hr />";
        }
        endwhile; else : endif;
      @endphp

    <div class="contact-us">
      <h3>Contact Us</h3>
      <div class="main-text">

        @php
          $page_id = 292;
          $contact = ( get_field( 'contact_us', $page_id ) ) // Gets content from Join & Support page so it's the same on all subpages
        @endphp

        @php
          echo $contact;
        @endphp

    </div>
  </div>
</div>
