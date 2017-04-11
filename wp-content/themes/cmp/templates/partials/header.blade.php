{{-- <header class="sign-up-header">
  <form class="" action="index.html" method="post">
    <input type="text" name="" value="">
    <a href="#" class="button">Subscribe</a>
  </form>
</header> --}}

<header class="site-header">
  <div class="container">
    <img src="<?= App\asset_path('images/logo--cmp.svg') ?>" alt="" class="site-header--logo"/>
    {{-- <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a> --}}



    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif

      <ul class="nav">
        <li><a href="#">Things to do</a></li>
        <li><a href="#">Plan a visit</a></li>
        <li><a href="#">Join and support</a></li>
        <li><a href="#">Great event spaces</a></li>
        <li><a href="#">Carnegie Magazine</a></li>
        <li><a href="#">About Us</a></li>
      </ul>


      <ul class="mobile--nav">
        <ul class="mobile__plan">
          <li>Plan your visit </li>
          <div class="mobile__symbols">
            <li class="mobile__down"> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
            <li class="mobile__search"> <i class="fa fa-search" aria-hidden="true"></i> </li>
            <li class="mobile__hamburger"> <i class="fa fa-bars" aria-hidden="true"></i> </li>
          </div>

        </ul>




        <li class="mobile--nav_link"><a href="#">Things to do</a> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
          <ul class="mobile-nav--sub__items">
            <li class="mobile-sub__link"><a href="#">Nights at the Museum</a></li>
            <li class="mobile-sub__link"><a href="#">Learn With Us</a></li>
            <li class="mobile-sub__link"><a href="#">View Our Exhibitions</a></li>
            <li class="mobile-sub__link"><a href="#">Explore Our Collections</a></li>
            <li class="mobile-sub__link"><a href="#">Travel With Us</a></li>
            <li class="mobile-sub__link"><a href="#">Member Events</a></li>
          </ul>
        <li class="mobile--nav_link"><a href="#">Plan a visit</a> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
        <li class="mobile--nav_link"><a href="#">Join and support</a> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
        <li class="mobile--nav_link"><a href="#">Great event spaces</a> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
        <li class="mobile--nav_link"><a href="#">Carnegie Magazine</a> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
        <li class="mobile--nav_link"><a href="#">About Us</a> <i class="fa fa-chevron-down" aria-hidden="true"></i> </li>
      </ul>


    </nav>



  </div>
</header>
