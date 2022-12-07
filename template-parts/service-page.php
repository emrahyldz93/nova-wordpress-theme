<?php /* Template Name: Hizmetlerimiz */ ?>

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
  <!-- START SERVICES ITEMS -->
  	<div id="services-items">
      <div class="container">
        <div class="row ">
          <div class="col-lg-12  ">

              <?php
              $layout = $options['ana-sayfa-design-service'];
             foreach ($layout as $n_t) {


  					echo '	<div class="col-md-4 float-left">
  							<div class="service-item">
  								<div class="service-item-img">
  									<img src="'.$n_t['opt-service-image']['url'].'" alt="'.$n_t['opt-service-title'].'" class="w-100" />
  									<i class="'.$n_t['opt-service-icon'].' service-item-icon text-white"></i>
  								</div>
  								<div class="card">
  									<h5>'.$n_t['opt-title-service'].'</h5>
  									<p>'.$n_t['opt-content-service'].'</p>
  									<a href="'.$n_t['opt-buttonurl-service'].'" class="btn btn-sm bg-blue">Teklif İste</a>
  								</div>
  							</div>
  						</div>
            ';}  ?>


  				</div>

  			</div>
  		</div>
  	</div>
  	<!-- END SERVICES ITEMS -->

<?php   include 'appointment.php'; ?>
<?php   include 'get-now.php'; ?>
<?php   include 'clients.php'; ?>
<?php get_footer(); ?>
