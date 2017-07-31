{{-- Member Perks--the horizontal bar of sub-page links under main content on membership pages --}}

<div class="member-perks">

  <div class="content-container">

    <hr />

    <div class="sub-page-container">

      <?php $count = 0 ?>

      <?php if( have_rows('sub_page') ): while ( have_rows('sub_page') ) : the_row(); ?>

      <div class="sub-page">

        <a href="{{ the_sub_field('link') }}">

          <img class="sub-page__image" src="{{ the_sub_field('image') }}">

          <div class="sub-page__text-box">
            <h4>{{ the_sub_field('title') }}</h4>
          </div>

        </a>

      </div>

      <?php
        $count = $count + 1;

          if ($count > 3) {
            echo "</div>";
            echo "<hr />";
          }
      ?>

      <?php endwhile; else : endif; ?>

    <div class="contact-us">

      <h3>Contact Us</h3>
      <div class="main-text">
        <p>
          The Membership Team is here to help, and we’d be
          glad to answer your questions or update your contact
          information. We’re available every Monday through
          Friday from 8:30 a.m. to 5 p.m., so please feel free
          to email, call, or tweet at us. We strive to answer every
          call personally and to respond to all emails within one business day.
        </p>
      <div>
        Email: <a href="mailto:membership@carnegiemuseums.org">membership@carnegiemuseums.org</a><br />
        Phone: 412.622.3314<br />
        Twitter: <a href="https://twitter.com/carnegiemembers?lang=en">@carnegiemembers</a><br />
      </p>

    </div>

  </div>

</div>
