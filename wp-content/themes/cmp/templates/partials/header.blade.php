<header class="top-bar-container">
  <div class="top-bar">
    <div class="top-bar__left">
      <form class="top-bar__form" action="index.html" method="post">
        <input type="text" name="" value="" placeholder="Enter your email">
        <button class="green-button" id="top-bar__subscribe-button" href="#">Subscribe</a>
      </form>
      <a href="/join-support/membership"><button class="green-button">Join</button></a>
      <a href="/join-support/donate"><button class="green-button">Donate</button></a>
    </div>
    <nav>
      <ul class="top-bar-nav">

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
          <button  class="nav-icon nav-icon-search quickview-btn" href="#search" aria-label="Search navigation trigger" title="Search">
            <i class="icon -search" aria-hidden="true"></i>
          </button>
        </li>

        <!-- mobile nav btn-->
        <li>
          <button class="nav-icon nav-icon-hamburger quickview-btn" href="#quickview-nav" aria-label="Menu" Title="Menu" role="button" aria-label="Mobile navigation trigger">
            <i class="icon -hamburger" aria-hidden="true"></i>
          </button>
        </li>
      </ul>
    </nav>
  </div>
</header>

<!-- quickview tray -->
<header class="quickview-container">

  <!-- quick visit -->
  <div class="quickview quickview-visit" id="visit">
    <figure itemprop="hoursAvailable" itemtype="http://schema.org/OpeningHoursSpecification" class="quickview-visit--details">
      <figcaption>Hours</figcaption>
    </figure>
    <figure class="quickview-visit--details">
      <figcaption>Admission</figcaption>
      <div class="quickview-visit--admission">
        <h3 class="featured-price">50% off regular admission
          weekdays after 3pm</h3>
      </div>
    </figure>
    <figure class="quickview-visit--callouts">
      <figcaption>What's going on?</figcaption>
        <aside>
        </aside>
    </figure>
  </div>

  <!-- mobile nav  -->
  <nav class="quickview quickview-nav" id="quickview-nav" role='navigation' aria-label="Global navigation" >
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
        <input type="text" id="search-field" placeholder="search" name="s" value="">

        {{-- <label for="search-field"> Search</label> --}}
      </fieldset>
      <button type="submit" class="btn" title="Start search"><i class="icon -search button"></i></button>
    </form>
  </div>
</header>
<div class="quickview-overlay"></div>

<!-- main header -->
<header class="header-main">
  <a href="/">
    <img src="<?= App\asset_path('images/logo--cmp.svg') ?>" alt="" class="site-header--logo"/>
  </a>

    <!-- desktop nav-->
    <nav class="desktop-nav-container" role='navigation' aria-label="Global navigation">

      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'desktop-nav']) !!}
      @endif

    </nav>
</header>
