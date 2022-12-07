<?php   $options = get_option( 'nt_options' ); // unique id of the framework ?>
<!-- START FOOTER -->
<div id="footer" class="bg-black">
  <div class="container">
    <div class="row">

      <div class="col-lg-3">
        <div class="footer-heading">
          <h4 class="heading-icon">İletişim Bilgileri</h4>
        </div>
        <div class="footer-contact">
          <p><i class="mdi mdi-map-marker color-yellow"></i>  <?php echo $options['opt-site-adres'] ?></p>
          <p><i class="mdi mdi-email color-yellow"></i><?php echo $options['opt-site-mail'] ?></p>
          <p><i class="mdi mdi-phone-in-talk color-yellow"></i>  <?php echo $options['opt-site-tel'] ?></p>
        </div>
        <div class="footer-logo">
          <img style="max-width:110px;" src="<?php echo $options['opt-media-footer-logo']['url'] ?>" alt="<?php echo $options['opt-media-footer-logo']['alt'] ?>" />
        </div>
      </div>

      <div class="col-lg-3">
        <div class="footer-heading">
          <h4 class="heading-icon">Dolaşım Menüsü</h4>
        </div>
        <div class="footer-list">
          <?php
            wp_nav_menu([
       'menu'            => 'top',
       'theme_location'  => 'footer-1',
       'container'       => 'div',
       'container_id'    => 'bs4navbar',
       'container_class' => '',
       'menu_id'         => 'headmainmenu',
       'menu_class'      => '',
       'depth'           => 2,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
      ]);
     ?>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="footer-heading">
          <h4 class="heading-icon">Turlarımız</h4>
        </div>
        <div class="footer-list">
          <?php
            wp_nav_menu([
       'menu'            => 'top',
       'theme_location'  => 'footer-2',
       'container'       => 'div',
       'container_id'    => 'bs4navbar',
       'container_class' => '',
       'menu_id'         => 'headmainmenu',
       'menu_class'      => '',
       'depth'           => 2,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
      ]);
     ?>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="footer-heading">
          <h4 class="heading-icon">Fayfalı Bağlantılar</h4>
        </div>
        <div class="footer-list">
          <?php
            wp_nav_menu([
       'menu'            => 'top',
       'theme_location'  => 'footer-3',
       'container'       => 'div',
       'container_id'    => 'bs4navbar',
       'container_class' => '',
       'menu_id'         => 'headmainmenu',
       'menu_class'      => '',
       'depth'           => 2,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
      ]);
     ?>
        </div>

      </div>

    </div>
  </div>
</div>
<!-- END FOOTER -->

<!-- START SUB FOOTER -->
<div id="sub-footer">
  <div class="container">
    <div class="row d-flex align-items-center">

      <div class="col-lg-6">
        <div class="sub-footer-left">
          <p class="m-0"><?php echo $options['opt-copyright'] ?></p>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="sub-footer-right">
          <ul>
            <li><a target="_blank" href="<?php echo $options['opt-facebook-url'] ?>"><i class="mdi mdi-facebook"></i></a></li>
            <li><a target="_blank" href="<?php echo $options['opt-twitter-url'] ?>"><i class="mdi mdi-twitter"></i></a></li>
            <li><a target="_blank" href="<?php echo $options['opt-pinterest-url'] ?>"><i class="mdi mdi-pinterest"></i></a></li>
            <li><a target="_blank" href="<?php echo $options['opt-google-url'] ?>"><i class="mdi mdi-google-plus"></i></a></li>
            <li><a target="_blank" href="<?php echo $options['opt-linkedin-url'] ?>"><i class="mdi mdi-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END SUB FOOTER -->

<!-- START TO TOP BTN -->
<div class="btn bg-blue backto-top-btn">
  <i class="mdi mdi-arrow-up"></i>
</div>
<!-- END TO TOP BTN -->
<!-- START SCRIPTS -->
	<!-- Jquery -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery/jquery.easing.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Isotope -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/magnific/jquery.magnific-popup.min.js"></script>

    <!-- Counter -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/counter.js"></script>

    <!-- Isotope -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/isotope.pkgd.min.js"></script>

    <!-- Owl Carousel -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

    <!-- Wow Min -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/wow.min.js"></script>

    <!-- Slick Carousel -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>

    <!-- Common Script -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/common-script.js"></script>
<!-- END SCRIPTS -->
<?php wp_footer(); ?>

</body>
</html>
<?php echo $options['opt-google-analitik'] ?>
