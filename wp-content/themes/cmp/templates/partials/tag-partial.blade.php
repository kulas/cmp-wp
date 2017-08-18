{{-- For topic pages --}}

<div class="generic-article tag-partial">
  <article @php(post_class())>
      <img class="article__image" src="{{ the_field('square_image') }}">
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
