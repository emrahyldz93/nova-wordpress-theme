<?php get_header(); ?>
<!-- START BREADCRUMB -->
<?php wp_reset_query(); ?>
<?php $appointment = $options['opt-appointment-setting'] ?>
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

<?php get_footer(); ?>
