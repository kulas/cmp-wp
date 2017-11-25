@extends('layouts.base')

@section('content')
  @include('partials.content-carnegie-magazine-nav')
  <div class="magazine-sub-page">
    @include('partials.page-header')

    @if(have_posts()):
      @while(have_posts()) @php(the_post())
        @include('partials.tag-partial')
      @endwhile
    @else
      <div class="generic-article tag-partial">
        <article @php(post_class())>
          <p>No posts yet, check back soon!</p>
        </article>
      </div>
    @endif
  </div>
@endsection
