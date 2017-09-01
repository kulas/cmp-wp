<div class="content-container tabs-page">
  <div class="main-text">
    @php
      if ( have_posts() ) :
      while ( have_posts() ) :
      the_post()
    @endphp
       {{ the_content() }}
    @php
      endwhile; else : endif;
    @endphp
  </div>
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
            <a class="tab__link tab__button" href="#tab-content-{{ $tab_index }}" id="tab-{{ $tab_index }}" tabindex="{{ $tab_index === 0 ? "0" : "-1" }}" role="tab" aria-controls="tab-content-{{ $tab_index }}" aria-selected="{{ $tab_index === 0 ? "true" : "false" }}">
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
        <button class="tab__title tab__button" aria-controls="tab-content-{{ $content_index }}" aria-expanded="{{ $content_index === 0 ? "true" : "false" }}">{{ get_sub_field('tab_title') }}</button>
        <div class="tab-panel" id="tab-content-{{ $content_index }}" aria-labelledby="tab-{{ $content_index }}" aria-hidden="{{ $content_index === 0 ? "false" : "true" }}" role="tabpanel">
          @php
            while(have_rows('tab_body_layout')): the_row();
              if(get_row_layout() == 'text'):
          @endphp
            <div class="tab__body">
              {!! get_sub_field('tab_copy') !!}
            </div>
          @php
            elseif(get_row_layout() == 'trip'):
            $image = get_sub_field('trip_image');
          @endphp
            <div class="tab__trip">
              <div class="tab__trip-image">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" />
              </div>

              <div class="tab__body">
                {!! get_sub_field('trip_copy') !!}
              </div>
            </div>
          @php
            endif; endwhile;
          @endphp
        </div>
      @php
        $content_index++;
        endwhile;
      @endphp
    </div>
  @php
    endif;
  @endphp
</div>
