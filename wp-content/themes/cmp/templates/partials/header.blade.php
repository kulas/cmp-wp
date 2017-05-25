{{-- <header class="sign-up-header">
  <form class="" action="index.html" method="post">
    <input type="text" name="" value="">
    <a href="#" class="button">Subscribe</a>
  </form>
</header> --}}
<div class="overlay"></div>
<header class="site-header">
  <div class="container">
    <a href="/">
      <img src="<?= App\asset_path('images/logo--cmp.svg') ?>" alt="" class="site-header--logo"/>
    </a>
    {{-- <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a> --}}


    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif

      <ul class="nav-tray nav__mobile">
         <li class="nav__plan">Plan your visit </li>
         <div class="nav__symbols">
           <li class="nav__symDown"> <i class="fa fa-chevron-down" aria-hidden="true"></i>  </li>
           <li class="nav__symSearch"> <i class="fa fa-search" aria-hidden="true"></i> </li>
           <li class="nav__symHamburger"> <i class="fa fa-bars" aria-hidden="true"></i> </li>
         </div>
       </ul>

       <div class="nav-tray navMobile__search">
         <form class="form-search" action="/" method="get" role="search">
           <legend class="screen-reader-text">Search form</legend>
           <fieldset>
             <label for="search-field">Search</label>
             <input type="text" id="search-field" name="s" placeholder="Search" />
           </fieldset>
           <button type="button" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
         </form>
       </div>

       <div class="nav-tray navmobile__planDrop"></div>

      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav--mobile']) !!}
      @endif
    </nav>
  </div>
</header>
