{{--
  Template Name: Learn With Us
--}}

<div id="learn-with-us">

  <div class="hero-header" style="background-image:url('/wp-content/themes/cmp/assets/images/learn-with-us.png')">

    <div class="hero-header__text">
      <h1>Learn With Us</h1>
    </div>

  </div>

  <div class="content-container">

    <div class="learn__text-box">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
      endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>

    </div>

    <hr>

    <div class="learn__categories">

      <div class="category learn__categories__all-ages" style="background-image:url('/wp-content/themes/cmp/assets/images/allages.jpeg')">

        <div class="category__title-all-ages">
          <h3>All Ages</h3>
        </div>

      </div>

      <div class="category learn__categories__adults" style="background-image:url('/wp-content/themes/cmp/assets/images/adults.jpg')">

        <div class="category__title-adults">
          <h3>Adults</h3>
        </div>

      </div>

      <div class="category learn__categories__kids-families" style="background-image:url('/wp-content/themes/cmp/assets/images/family.jpeg')">

        <div class="category__title-kids">
          <h3>Kids/Families</h3>
        </div>

      </div>

      <div class="category learn__categories__teens" style="background-image:url('/wp-content/themes/cmp/assets/images/teens.jpeg')">

        <div class="category__title-teens">
          <h3>Teens</h3>
        </div>

      </div>

      <div class="category learn__categories__schools" style="background-image:url('/wp-content/themes/cmp/assets/images/school.jpg')">

        <div class="category__title-schools">
          <h3>Schools & Educators</h3>
        </div>

      </div>

    </div>

  </div>

</div>
