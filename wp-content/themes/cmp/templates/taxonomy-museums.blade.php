@extends('layouts.base')

@section('content')

<div class="no-header">
  <div class="content-container">
    <h1>{{ single_term_title() }}</h1>
    <div class="content-wrapper">
      <div class="l-long">
        @php
          if (have_posts()) : while (have_posts()) : the_post();
        @endphp
          @include('partials.content-expert')
        @php
          endwhile; endif;
        @endphp
      </div>
      <div class="l-short">
      </div>
    </div>
  </div>
</div>

@endsection
