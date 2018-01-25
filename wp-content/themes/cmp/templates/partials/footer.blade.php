{{-- Footer, I know it's long, sorry. --}}

@php($minimal_template = get_field('minimal_template'))
@if (empty($minimal_template))
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

              {!! get_field('subscribe_form', 'options', false) !!}

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
                <p>©{{ date("Y") }} Carnegie Museums of Pittsburgh</p>
                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/terms-of-use">Terms of Use</a>
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

      <div class="sticky-join-donate">
        <a href="/join-support/membership/joinrenew" class="sticky-join-donate__join">Join</a>
        <a href="https://secure2.convio.net/cmp/site/Donation2;jsessionid=ECDA1B790F2D30313CA854DEFD21A947.app274b?df_id=14000&14000.donation=form1" class="sticky-join-donate__donate">Donate</a>
      </div>

  </footer>
@endif
