<?php get_header(); ?>
<?php wp_reset_query(); ?>
<?php $appointment = $options['opt-appointment-setting'] ?>
<!-- START BREADCRUMB -->
  <div id="breadcrumb" class="breadcrumb-bg" style="	background-image: url(<?php echo $options['home-breadcrumb-img']['url'] ?>);background-attachment:fixed">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6">
          <div class="breadcrumb-left">
          <?php the_breadcrumb(); ?>
        </div>
        </div>
        <div class="col-lg-6">
          <div class="breadcrumb-right">
            <h5 class="heading-icon"><?php the_title(); ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END BREADCRUMB -->
<!-- START SERVICE SINGLE -->

<?php if ('project' == get_post_type()) {
  ?>



<div id="services-items">
  <div class="container">
    <div class="row d-flex align-items-center">

      <div class="col-lg-12 service-single-col">
        <div class="row">
          <div class="col-lg-8">
            <div class="service-single-img">
              <div class="hover-eff-warp">
                <div>
                  <?php the_post_thumbnail( 'large', array( 'class' => ' img-fluid W-100  ')); ?>
                </div>
                <div class="hover-eff-content hover-eff-bottom">
                  <ul>
                    <li><a href="project-single.html"><i class="mdi mdi-link"></i></a></li>
                    <li><a class="mfpclick" href="#house-cleaning1"><i class="mdi mdi-eye"></i></a></li>
                  </ul>
                  <h5><?php the_title(); ?></h5>
                </div>
              </div>
              <div id="house-cleaning1" class="mfp-hide">
                <a href="<?php the_post_thumbnail_url( 'large', array( 'class' => ' img-fluid W-100  ')); ?>"></a>
              </div>
            </div>
            <div class="service-single-content">
              <div class="mb-30px">
                <div class="w-75 m-auto">
                  <div class="project-single-list">
                    <div class="card">
                      <div class="row">
                        <div class="col-lg-12 mb-15px">
                          <div class="row">
                            <div class="col-lg-4">
                              <p>Şirket Adı :</p>
                            </div>
                            <div class="col-lg-8">
                              <p><span><?php echo get_post_meta($post->ID, 'company_name', true) ?></span></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 mb-15px">
                          <div class="row">
                            <div class="col-lg-4">
                              <p>Başlama Tarihi :</p>
                            </div>
                            <div class="col-lg-8">
                              <p><span><?php echo get_post_meta($post->ID, 'date', true) ?></span></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 mb-15px">
                          <div class="row">
                            <div class="col-lg-4">
                              <p>Açıklama :</p>
                            </div>
                            <div class="col-lg-8">
                              <p><span><?php the_excerpt(); ?></span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo the_content(); ?>
              <ul class="share-social">
                <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink('') ?>"><i class="mdi mdi-facebook"></i></a></li>
                <li><a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="mdi mdi-twitter"></i></a></li>
                <li><a href="https://wa.me/?text=<?php urlencode(the_permalink());?>"><i class="mdi mdi-whatsapp"></i></a></li>
                <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink('') ?>"><i class="mdi mdi-linkedin"></i></a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="sidebar">
              	<?php dynamic_sidebar('primary'); ?>

              <div class="sidebar-col">
                <div class="card sidebar-helpcare">
                  <h5 class="heading-icon"><?php echo $appointment['opt-appointment-title'] ?></h5>
                <a class="text-white" href="tel:<?php echo $appointment['opt-appointment-phone'] ?>">  <h3><i class="mdi mdi-phone-in-talk"></i><?php echo $appointment['opt-appointment-phone'] ?> </h3></a>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<?php } else { ?>
  <!-- START BLOG -->
<div id="blog">
  <div class="container">
    <div class="row">

      <div class="col-lg-8">
        <div class="row">

          <div class="col-lg-12">
            <div class="blog-item">
              <div class="blog-item-img mb-20px">
                <?php the_post_thumbnail( 'large', array( 'class' => ' img-fluid W-100  ')); ?>
                <div class="blog-date">
                  <h6><?php the_time('d F Y'); ?> - <?php the_time('G:i'); ?></h6>
                </div>
              </div>
              <p><?php the_content(); ?></p>
              <ul class="share-social">
                <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink('') ?>"><i class="mdi mdi-facebook"></i></a></li>
                <li><a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="mdi mdi-twitter"></i></a></li>
                <li><a href="https://wa.me/?text=<?php urlencode(the_permalink());?>"><i class="mdi mdi-whatsapp"></i></a></li>
                <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink('') ?>"><i class="mdi mdi-linkedin"></i></a></li>
              </ul>

              <div class="blog-comment-form">
                  <div class="row d-flex align-items-center">

                    <div class="col-lg-12 text-center mb-15px">
                      <h4 class="heading-icon">Yorum Alanı</h4>
                    </div>
                    <?php comments_template(); ?>
                  </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-4">
        <div class="sidebar">
          	<?php dynamic_sidebar('primary'); ?>

          <div class="sidebar-col">
            <div class="card sidebar-helpcare">
              <h5 class="heading-icon"><?php echo $appointment['opt-appointment-title'] ?></h5>
            <a class="text-white" href="tel:<?php echo $appointment['opt-appointment-phone'] ?>">  <h3><i class="mdi mdi-phone-in-talk"></i><?php echo $appointment['opt-appointment-phone'] ?> </h3></a>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- END BLOG -->

<?php } ?>
<!-- END SERVICE SINGLE -->
<?php get_footer(); ?>
