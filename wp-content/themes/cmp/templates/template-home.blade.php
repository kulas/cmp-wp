{{--
  Template Name: Home
--}}

@extends('layouts.base')

@section('content')

    @include('partials.content-home')
    @include('partials.content-featured-exhibits')
    @include('partials.content-featured-articles')
    @include('partials.content-things-to-do')
    @include('partials.content-our-museums')
    @include('partials.content-twitter-feed')

@endsection
