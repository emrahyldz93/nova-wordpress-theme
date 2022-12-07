<?php get_header(); ?>
<!-- START 404 ERROR -->
<div id="errorpage">
  <div class="container">
    <div class="row d-flex align-items-center">

      <div class="col-sm-8">
        <div class="errorpage-item">
          <div class="errorpage-left">
            <h1 class="heading-icon">Oops!! 404 Hata</h1>
            <h5>Aradığınız Sayfa Bulunamadı <i class="mdi mdi-close text-danger"></i></h5>
            <a href="<?php bloginfo('url') ?>" class="btn bg-blue"><i class="mdi mdi-home"></i> Ana sayfa</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="errorpage-item">
          <div class="errorpage-right">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/404.jpg" class="w-100" alt="" />
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END 404 ERROR -->

<?php   include 'template-parts/get-now.php'; ?>
<?php   include 'template-parts/clients.php'; ?>

<?php get_footer(); ?>
