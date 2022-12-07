<?php get_header(); ?>
<!-- START BREADCRUMB -->
  <div id="breadcrumb" class="breadcrumb-bg" style="	background-image: url(<?php echo $options['home-breadcrumb-img']['url'] ?>);background-attachment:fixed">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6">
          <div class="breadcrumb-left">

        </div>
        </div>
        <div class="col-lg-6">
          <div class="breadcrumb-right ">
            <h5 class="heading-icon"><?php the_category() ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END BREADCRUMB -->
<div id="blog">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-lg-12 d-flex text-center">

      </div>
      <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-lg-4">
					<div class="blog-item">
						<div class="blog-item-img">
							<img src="<?php the_post_thumbnail_url( 'large'); ?>" alt="" class="w-100" />
							<div class="blog-date">
								<h6><?php the_time('d F Y'); ?> </h6>
							</div>
						</div>
						<div class="card">
							<h5><?php the_title(); ?></h5>
							<p><?php echo substr(get_the_excerpt(), 0, 87); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn btn-sm bg-blue">Devamı..</a>
						</div>
					</div>
				</div>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
    <?php wp_reset_postdata();  ?>
    <div class="col-lg-12">
      <div class="text-center">
        <nav>
          <ul class="pagination">
            <?php theWPsayfalama(); ?>
          </ul>
        </nav>
      </div>
    </div>


    </div>
  </div>
</div>

<?php get_footer(); ?>
