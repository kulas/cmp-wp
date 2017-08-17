@extends('layouts.base')

@section('content')
  @include('partials.page-header')

  @while(have_posts()) @php(the_post())
    @include('partials.tag-partial')
  @endwhile
@endsection
