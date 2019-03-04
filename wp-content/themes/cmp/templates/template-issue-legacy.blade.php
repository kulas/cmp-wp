{{--
  Template Name: Legacy Magazine Layout
  Template Post Type: issue
--}}

@extends('layouts.base')

@php($minimal_template = get_field('minimal_template'))

@section('content')
  @if (empty($minimal_template))
    @include('partials.content-carnegie-magazine-nav')
  @endif
  @while(have_posts()) @php(the_post())
    @include('partials/content-single-issue-legacy')
  @endwhile
@endsection
