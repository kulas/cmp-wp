{{-- Homepage Twitter Feed section --}}

<div id="twitter-feed" class="section--secondary">
  <div class="content-container">
    <div id="twitter-info">
      <img src="@asset('images/twitter.png')" alt="Twitter" />
      <h2>Twitter Feed</h2>
      <a href="https://twitter.com/carnegiemembers">@CarnegieMembers</a>
      <p>Keep up with the latest from Carnegie Museums</p>
    </div>
    <div class="cmp-twitter-feed">

      @php
        dynamic_sidebar( 'twitter-feed' );
      @endphp

    </div>
  </div>
</div>
