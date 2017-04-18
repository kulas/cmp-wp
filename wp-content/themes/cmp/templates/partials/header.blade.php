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



      <ul class="nav-mobile--toggle">
         <li class="nav-mobile__plan">Plan your visit </li>
         <div class="nav-mobile__symbols">
           <li class="nav-mobile-symbols__down"> <i class="fa fa-chevron-down" aria-hidden="true"></i>  </li>
           <li class="nav-mobile-symbols__search"> <i class="fa fa-search" aria-hidden="true"></i> </li>
           <li class="nav-mobile-symbols__hamburger"> <i class="fa fa-bars" aria-hidden="true"></i> </li>
         </div>
       </ul>

       <div class="nav--mobile__search">
         <form class="form-search" action="/" method="get" role="search">
           <legend class="screen-reader-text">Search form</legend>
           <fieldset>
             <label for="search-field">Search</label>
             <input type="text" id="search-field" name="s" placeholder="Search" />
           </fieldset>
           <button type="button" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
         </form>
       </div>

       <div class="plan">

       </div>




      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav--mobile']) !!}
      @endif
    </nav>

    



  </div>
</header>
