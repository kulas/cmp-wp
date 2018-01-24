{{--
  Template Name: Carnegie Magazine Subpage
--}}

@extends('layouts.base')

@php($minimal_template = get_field('minimal_template'))

@section('content')
  @if (empty($minimal_template))
    @include('partials.content-carnegie-magazine-nav')
  @endif

  <div class="magazine-sub-page">
    @include('partials.content-no-header-template')
  </div>
@endsection
