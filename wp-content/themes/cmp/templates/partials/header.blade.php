@php($minimal_template = get_field('minimal_template'))
@if (empty($minimal_template))
  <header class="top-bar-container">
    <div class="top-bar">
      <div class="top-bar__left">
        <div class="top-bar__form">
          @php($subscribe_form_action = get_field('subscribe_form_action', 'options') ?: 'http://members.carnegiemuseums.org/site/Survey')
          <label for="128" class="label--hidden">Subscribe to our emails</label>
          <form name="survey_11603" method="POST" action="{{$subscribe_form_action}}">
            <p>
              <input type="email" name="cons_email" size="25" maxlength="255" placeholder="SIGN UP FOR EMAIL" />
              <input type="submit" name="ACTION_SUBMIT_SURVEY_RESPONSE" value="Sign Up" class="button" />
              <input type="hidden" name="cons_info_component" value="t" />
              <input type="hidden" name="SURVEY_ID" value="11603" />
              <input type="hidden" name="USER_HAS_TAKEN" value="null" />
              <input type="hidden" name="SURVEY_IGNORE_ERRORS" value="TRUE" />
              <input type="hidden" name="QUESTION_STAG_APP_ID" value="" />
              <input type="hidden" name="QUESTION_STAG_APP_REF_ID" value="" />
              <input type="hidden" name="QUESTION_STAG_CTX_TYPE" value="" />
              <input type="hidden" name="ERRORURL" value="http://www.carnegiemuseums.org/#error"  /><!--local page for error redirect-->
              <input type="hidden" name="NEXTURL" value="http://members.carnegiemuseums.org/site/PageNavigator/CMP_email_signup_box_preferences.html#success" /><!--local page for successful submission redirect-->
            </p>
            <div style="display:none">
              <input type="text" name="denySubmit" value="" alt="This field is used to prevent form submission by scripts." />
            </div>
          </form>
        </div>

        <a href="/join-support/membership/joinrenew" class="green-button">Join</a>
        <a href="https://secure2.convio.net/cmp/site/Donation2;jsessionid=ECDA1B790F2D30313CA854DEFD21A947.app274b?df_id=14000&14000.donation=form1" class="green-button">Donate</a>
      </div>
      <nav>

        <ul class="top-bar-nav">

          {{-- Plan a Visit link --}}
          <div class="top-bar__plan-visit">
            <a href="/plan-a-visit">Plan Your Visit</a>
          </div>

          <div class="nav-buttons">

            <!-- visit callout btn-->
            <li>
              <a href="#visit" class="quickview-btn nav-visit" title="Plan Your Visit" aria-label="Plan Your Visit navigation trigger">
                <span>Plan Your Visit</span>
                <span class="nav-icon nav-icon-visit">
                  <i class="icon -visit" aria-hidden="true"></i>
                </span>
              </a>
            </li>

            <!-- search nav btn-->
            <li>
              <button class="nav-icon nav-icon-search quickview-btn" href="#search" aria-label="Search navigation trigger" title="Search">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </li>

            <!-- mobile nav btn-->
            <li>
              <button class="nav-icon nav-icon-hamburger quickview-btn" href="#quickview-nav" aria-label="Menu" Title="Menu" aria-label="Mobile navigation trigger">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
            </li>

          </div>

        </ul>
      </nav>
    </div>
  </header>

  <!-- quickview tray -->
  <header class="quickview-container">

    <!-- mobile nav  -->
    <nav class="quickview quickview-nav mobile-nav-container" id="quickview-nav" role='navigation' aria-label="Global navigation" >
      @php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => '']);
        endif;
      @endphp
    </nav>

    <!-- search  -->
    <div class="quickview" id="search" >
      <form class="form-search" action="/" method="get" role="search">

        {{-- <legend class="screen-reader-text">Search form</legend> --}}
        <fieldset>
          <label for="search-field" class="label--hidden">Search site</label>
          <input type="text" id="search-field" placeholder="search" name="s" value="">

          {{-- <label for="search-field"> Search</label> --}}
        </fieldset>
        <button type="submit" class="btn" aria-label="Start search" value="search site"><i class="icon-search button"></i></button>
      </form>
    </div>
  </header>

  <div class="quickview-overlay"></div>
@endif

<!-- main header -->
<header class="header-main">
  <a href="/">
    <img src="<?= App\asset_path('images/logo--cmp.svg') ?>" alt="Carnegie Museums of Pittsburgh" class="site-header--logo"/>
  </a>

  @if (empty($minimal_template))
    <!-- desktop nav-->
    <nav class="desktop-nav-container" role='navigation' aria-label="Global navigation">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'desktop-nav']) !!}
      @endif
    </nav>
  @endif
</header>
