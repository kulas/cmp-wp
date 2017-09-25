{{-- Footer, I know it's long, sorry. --}}

<footer class="footer">
  <div class="content-container">
      <div class="footer-links">
        <div class="left-section">

            <img class="footer-logo" src="@asset('images/cmpfooter.png')" alt="Carnegie Museums of Pittsburgh" />
              <div class="footer-links-section footer-links-section__small">
                <a href="http://cmoa.org">Carnegie Museum of Art</a>
                <a href="http://www.carnegiesciencecenter.org/">Carnegie Science Center</a>
                <a href="http://carnegiemnh.org">Carnegie Museum of Natural History</a>
                <a href="http://warhol.org">The Andy Warhol Museum</a>
              </div>


      </div>

      <hr class="hr-break-mobile">

      <div class="right-section">
        <div class="top-row">

              <div class="footer-links-section">
                <a href="/things-to-do">Things to Do</a>
                <a href="/plan-a-visit">Visit</a>
                <a href="/join-support">
                  Join &
                  <div>Support</div>
                </a>
              </div>

              <div class="footer-links-section">
                <a href="/great-event-spaces">Event Spaces</a>
                <a href="/about-us">About Us</a>
                <a href="/carnegie-magazine">Carnegie Magazine</a>
              </div>

              <div class="footer-links-section">
                <a href="/accessibility">Accessibility</a>
                <a href="/press">Press</a>
                <a href="/opportunities">Opportunities</a>
              </div>


        {{-- <div class="footer__right-div"> --}}

            {{-- <div class="footer-links-section footer-links-section__small">
              <a href="http://cmoa.org">Carnegie Museum
                <div>of Art</div>
              </a>
              <a href="http://www.carnegiesciencecenter.org/">Carnegie Science Center</a>
            </div>
            <div class="footer-links-section footer-links-section__small">
              <a href="http://carnegiemnh.org">Carnegie Museum of Natural History</a>
              <a href="http://warhol.org">The Andy Warhol Museum</a>
            </div> --}}

          {{-- </div> --}}

        </div>
        <hr class="hr-break">
        <div class="middle-row">
          <div class="email-subscribe">

            <label for="128" class="label--hidden">Subscribe to our emails</label>
            @php
              echo do_shortcode("[contact-form-7 id='128' title='Email Form']");
            @endphp

          </div>
            <div class="social-media">
              <a class="connect" href="/connect-with-us/">
                <span class="connect-1">Connect with our museums</span>
                <span class="connect-2">Social Media, Blogs, Apps & More ></span>
              </a>
            </div>
        </div>
        <hr class="hr-break mobile-hide">
        <div class="bottom-row">
          <div class="bottom-row__left">

            {{-- <div class="bottom-row__links">
              <a href="/accessibility">Accessibility</a><p>|</p>
              <a href="/press">Press</a><p>|</p>
              <a href="/careers">Careers</a><p>|</p>
              <a href="/volunteer">Volunteers</a>
            </div> --}}

            <hr class="mobile-hr">
            <div class="copyright">
              <p>©2017 Carnegie Museums of Pittsburgh</p>
              <a href="/privacy-policy">Privacy Policy</a>
            </div>
          </div>
          <div class="rad-container">
            <a href="https://radworkshere.org/">
              <img class="rad-logo" src="@asset('images/RAD-logo.png')" alt="Allegheny Regional Asset District" />
            </a>
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>

  <div class="sticky-join-donate">
    <a href="/join-support/membership/" class="sticky-join-donate__join">Join</a>
    <a href="/join-support/donate/" class="sticky-join-donate__donate">Donate</a>
  </div>

</footer>
