{{--
  Template Name: Carnegie Magazine Homepage
--}}

@extends('layouts.base')

@php($minimal_template = get_field('minimal_template'))

@section('content')
  @if (empty($minimal_template))
    @include('partials.content-carnegie-magazine-nav')
  @endif
  @include('partials.content-carnegie-magazine-home-1')
  @include('partials.content-carnegie-magazine-home-2')
  @include('partials.content-carnegie-magazine-home-3')
@endsection
