<?php /* Template Name: Hakkımızda */ ?>

<?php get_header(); ?>
<?php $about = $options['opt-about-setting']; ?>
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
	<!-- START ABOUT US -->
	<div id="about-us">
		<div class="container">
			<div class="row d-flex align-items-center">

				<div class="col-lg-5">
					<div class="about-left-img">
						<div>
							<div>
								<img src="<?php echo $about['opt-about-image']['url'] ?>" alt="<?php echo $about['opt-about-image']['alt'] ?>" class="w-100" />
							</div>
							<div class="pulse">
								<button type="button" id="clickplay" class="btn-none" data-toggle="modal" data-target="#video">
		                   <i class="mdi mdi-play-speed"></i>
		             </button>
							</div>
						</div>
						<div class="about-iso-title">
							<h6><?php echo $about['opt-about-certified'] ?></h6>
						</div>
					</div>
				</div>

				<div class="col-lg-7">
					<h5 class="heading-icon color-blue"><?php echo $about['opt-about-subtitle'] ?></h5>
					<h1><?php echo $about['opt-about-title'] ?></h1>
					<p><?php echo $about['opt-about-content'] ?></p>
					<ul class="about-btn-sec">
						<li class="about-phone"><i class="mdi mdi-phone-classic"></i> <?php echo $about['opt-about-phone'] ?></li>
					</ul>
				</div>
				<!-- video -->
				<div id="video" class="modal fade" role="dialog">
			        <div class="modal-dialog modal-lg">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                </div>
			                <div class="modal-body">
			                	<input type="hidden" value="<?php echo $about['opt-about-video'] ?>" id="videoinput">
			                    <iframe id="vidframe"></iframe>
			                </div>
			            </div>
			        </div>
			    </div>

			</div>
		</div>
	</div>
	<!-- END ABOUT US -->
  <!-- START SERVICE ITEMS -->
	<div id="services-items" class="bg-blue-light">
		<div class="container">
			<div class="row d-flex align-items-center">

				<div class="col-lg-4">
					<div class="service-item">
						<div class="card">
							<div class="card-icon">
								<i class="mdi mdi-trophy-variant"></i>
							</div>
							<h5><?php echo $about['opt-about-achiv'] ?></h5>
							<p><?php echo $about['opt-about-achiv-content'] ?></p>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="service-item">
						<div class="card">
							<div class="card-icon">
								<i class="mdi mdi-eye"></i>
							</div>
							<h5><?php echo $about['opt-about-vision'] ?></h5>
							<p><?php echo $about['opt-about-vision-content'] ?></p>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="service-item">
						<div class="card">
							<div class="card-icon">
								<i class="mdi mdi-bullseye-arrow"></i>
							</div>
							<h5><?php echo $about['opt-about-mission'] ?></h5>
							<p><?php echo $about['opt-about-mission-content'] ?></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END SERVICE ITEMS -->

<?php   include 'appointment.php'; ?>
<?php   include 'get-now.php'; ?>
<?php   include 'clients.php'; ?>
<?php get_footer(); ?>
