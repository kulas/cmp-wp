@php
  if( have_rows('tab_layout') ):
@endphp
  <div class="tabbed-content">
    <ul class="tabs-list" role="tablist">
      @php
        $tab_index = 0;
        while(have_rows('tab_layout')): the_row();
      @endphp
        <li class="tab" role="presentation">
          <a class="tab__link" href="#tab-content-{{ $tab_index }}" id="tab-{{ $tab_index }}" tabindex="{{ $tab_index === 0 ? "0" : "-1" }}" role="tab" aria-controls="tab-content-{{ $tab_index }}" aria-selected="{{ $tab_index === 0 ? "true" : "false" }}">
            {{ get_sub_field('tab_title') }}
          </a>
        </li>
      @php
        $tab_index++;
        endwhile;
      @endphp
    </ul>

    @php
      $content_index = 0;
      while(have_rows('tab_layout')): the_row();
    @endphp
      <div class="tab-panel" id="tab-content-{{ $content_index }}" aria-labelledby="tab-{{ $content_index }}" aria-hidden="{{ $content_index === 0 ? "false" : "true" }}" role="tabpanel">
        @php
          $image = get_sub_field('tab_image');
          if(!empty($image)):
        @endphp
          <div class="tab__image">
            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" />
          </div>
        @php
          endif;
        @endphp
        <div class="tab__body">
          {!! get_sub_field('tab_body') !!}
        </div>
      </div>
    @php
      $content_index++;
      endwhile;
    @endphp
  </div>
@php
  endif;
@endphp
