@extends('layouts.base')

@section('content')
  <div class="no-header">
    @while(have_posts()) @php(the_post())
      <div class="content-container">
        @include('partials/content-expert')
      </div>
    @endwhile
  </div>
@endsection
