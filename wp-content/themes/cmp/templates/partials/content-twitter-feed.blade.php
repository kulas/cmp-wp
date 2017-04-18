{{--
  Template Name: Twitter Feed
--}}

<div id="twitter-feed">

  <div class="content-container">

    <div id="twitter-info">
      <img src="wp-content/themes/cmp/assets/images/twitter.png">
      <h2>Twitter Feed</h2>
      <a href="https://twitter.com/carnegiemembers">@CarnegieMembers</a>
      <p>Keep up with the latest from Carnegie Museums</p>
    </div>

    <div class="cmp-twitter-feed">
      <?php dynamic_sidebar( 'twitter-feed' ); ?>
    </div>

  </div>

</div>
