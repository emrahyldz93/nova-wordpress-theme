<?php /* Template Name: İletişim */ ?>

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
          <div class="breadcrumb-right">
            <h5 class="heading-icon"><?php the_title(); ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END BREADCRUMB -->
<!-- START CONTACT US -->
<div id="contact-us">
  <div class="container">
    <div class="row d-flex align-items-center">

      <div class="col-lg-12">
        <div class="contactus-item">
          <div class="row d-flex align-items-center">
            <div class="col-lg-6">

              <div class="row d-flex align-items-center">

                <div class="col-lg-12 d-flex text-center">
                  <div class="section-start-col w-100">
                    <div>
                      <h2 class="m-0 heading-icon">İletişim Bilgilerimiz</h2>
                    </div>
                  </div>
                </div>

                    <?php echo do_shortcode('[contact-form-7 id="'.$appointment['opt-appointment-shortcode'].'" title="İletişim formu 1"]') ?>


              </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <p><i class="mdi mdi-map-marker color-yellow"></i> <?php echo $options['opt-site-adres'] ?></p>
              <p><i class="mdi mdi-email color-yellow"></i> <?php echo $options['opt-site-mail'] ?></p>
              <p><i class="mdi mdi-phone-in-talk color-yellow"></i> <?php echo $options['opt-site-tel'] ?></p>
            </div>
          </div>

        </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="contactus-item">
          <?php echo $options['opt-contact-map'] ?>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END CONTACT US -->
<?php   include 'get-now.php'; ?>
<?php   include 'clients.php'; ?>
<?php get_footer(); ?>
