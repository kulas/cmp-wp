{{-- Secondary navbar used on magazine navigation pages --}}

<nav class="magazine-nav-container desktop-nav-container" role='navigation' aria-label="Magazine navigation">

  @if (has_nav_menu('magazine_nav'))
    {!! wp_nav_menu(['theme_location' => 'magazine_nav', 'menu_class' => 'magazine_nav']) !!}
  @endif

</nav>
