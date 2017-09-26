{{-- For topic pages --}}

<div class="generic-article tag-partial">
  <article @php(post_class())>
      <div class="article__image">
        <img src="{{ the_field('square_image') }}" alt="{{ the_title() }}" />
      </div>
      <div class="article__content">
      <header>
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
        @include('partials/entry-meta')
      </header>
      <div class="main-text">
          @php(the_excerpt())
      </div>
    </div>
  </article>
</div>
