<!-- START OUR PROJECTS -->
<div id="our-projects" class="bg-blue-light">
  <div class="container">
    <div class="row d-flex align-items-center">

      <div class="col-lg-12 d-flex text-center">
        <div class="section-start-col w-100">
          <div class="text-center">
            <h2 class="heading-icon"><?php echo $options['home-project-bigtitle'] ?></h2>
            <p class="m-0 color-blue"><?php echo $options['home-project-title'] ?> <i class="mdi mdi-check-circle"></i></p>
          </div>

        </div>
      </div>
      <?php
      $args = array(
      'post_type' => 'project' );
      query_posts($args); if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="col-lg-4">
        <div class="hover-eff-warp">
          <div>
          <?php the_post_thumbnail( 'large', array( 'class' => ' img-fluid  ')); ?>
          </div>
          <div class="hover-eff-content hover-eff-bottom">
            <ul>
              <li><a href="<?php the_permalink(); ?>"><i class="mdi mdi-link"></i></a></li>
              <li><a class="mfpclick" href="#house-cleaning1"><i class="mdi mdi-eye"></i></a></li>
            </ul>
            <h5><?php the_title(); ?></h5>
          </div>
        </div>
        <div id="house-cleaning1" class="mfp-hide">
          <a href="<?php the_post_thumbnail_url( 'large', array( 'class' => ' img-fluid  ')); ?>"></a>
        </div>
      </div>
    <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>


    </div>
  </div>
</div>
<!-- END OUR PROJECTS -->
