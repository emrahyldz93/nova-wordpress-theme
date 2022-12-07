<!-- START BLOG -->
<div id="blog">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-lg-12 d-flex text-center">
        <div class="section-start-col w-50">
          <div class="float-left">
            <h2 class="heading-icon">Blog </h2>
            <p class="m-0 color-blue">Mükemmel Bilgiler <i class="mdi mdi-check-circle"></i></p>
          </div>
          <div class="float-right">
            <div class="section-start-btn">
              <a href="/blog" class="btn bg-blue">Tümünü Görüntüle</a>
            </div>
          </div>
        </div>
      </div>
      <?php   $args = array(
        'post_type' => 'post' );
        query_posts($args); if (have_posts()) : while (have_posts()) : the_post(); ?>
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

    </div>
  </div>
</div>
<!-- END BLOG -->
