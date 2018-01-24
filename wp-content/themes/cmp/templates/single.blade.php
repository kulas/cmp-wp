@extends('layouts.base')

@php($minimal_template = get_field('minimal_template'))

@section('content')
  @if (empty($minimal_template))
    @include('partials.content-carnegie-magazine-nav')
  @endif
  @while(have_posts()) @php(the_post())
    @include('partials/content-single-'.get_post_type())
  @endwhile
@endsection
