<?php ob_start(); @session_start(); $options = get_option( 'nt_options' ); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!-- Browser Bar Icon -->
<link rel="shortcut icon" href="<?php echo $options['opt-media-favicon']['url'] ?>" />

<!-- Meta -->
<meta http-equiv="Content-Type" content="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="googlebot" content="index,fallow" >
<meta name="robots" content="index,fallow" >
<meta name="author" content="Emrah Yıldız 0531 257 34 83">

<!-- Title -->
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php wp_head(); ?>

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700,800,900" rel="stylesheet">
<!-- END CSS -->
<?php wp_footer(); ?>
<style media="screen">
body{	font-family: '<?php echo $options['home-general-font']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-font']['font-weight'] ?> }
h1{font-size: <?php echo $options['home-general-h1']['font-size'] ?>;font-family: '<?php echo $options['home-general-h1']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-h1']['font-weight'] ?>}
h2{font-size: <?php echo $options['home-general-h2']['font-size'] ?>;font-family: '<?php echo $options['home-general-h2']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-h2']['font-weight'] ?>}
h3{font-size: <?php echo $options['home-general-h3']['font-size'] ?>;font-family: '<?php echo $options['home-general-h3']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-h3']['font-weight'] ?>}
h4{font-size: <?php echo $options['home-general-h4']['font-size'] ?>;font-family: '<?php echo $options['home-general-h4']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-h4']['font-weight'] ?>}
h5{font-size: <?php echo $options['home-general-h5']['font-size'] ?>;font-family: '<?php echo $options['home-general-h5']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-h5']['font-weight'] ?>}
h6{font-size: <?php echo $options['home-general-h6']['font-size'] ?>;font-family: '<?php echo $options['home-general-h6']['font-family'] ?>', sans-serif;font-weight:<?php echo $options['home-general-h6']['font-weight'] ?>}

	 .card-icon i, .pulse button i, .service-item-icon,.btn-primary, .slick-prev , .slick-next, .bg-blue{background-color: <?php echo $options['home-primary-color'] ?>!important;border-color:<?php echo $options['home-primary-color'] ?>!important; }
	.nav-item .active,.color-blue,.collapse-head button{color: <?php echo $options['home-primary-color'] ?>!important;}
	.btn .bg-white-default:hover , .card:hover h5,  .nav-link:hover{color: <?php echo $options['home-primary-color'] ?>!important;}
	.bg-yellow{ background-color: <?php echo $options['home-secondary-color'] ?>!important;border-color: <?php echo $options['home-secondary-color'] ?>!important}
	.color-yellow{color:<?php echo $options['home-secondary-color'] ?>!important;}
	a:hover{color:<?php echo $options['home-secondary-color'] ?>!important; }

	button[aria-expanded="true"]{color: white!important;background:<?php echo $options['home-primary-color'] ?>!important }
</style>
</head>

<body id="body-top">

 <!--START LOADER -->
 <?php   $loader = $options['opt-loader-setting'];  ?>
	<div style="background:<?php echo $loader['opt-loader-color'] ?>" <?php   if($loader['home-preloader-setting']==0) { echo 'hidden';} ?> class="loader">
	<?php if ( $loader['home-loader-image']['url']): ?>
			<img src="<?php echo $loader['home-loader-image']['url'] ?>" alt="" />
		<?php else: ?>
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/icons/loader.gif" alt="" />
	<?php endif; ?>
	</div>
	<!-- END LOADER -->

	<!-- START TOP HEADER -->
	<div id="top-header" class="bg-blue">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-12 p-0">

					<nav class="navbar navbar-expand-lg">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toptoggnav" aria-controls="toptoggnav" aria-expanded="false" aria-label="Toggle navigation">
							<i class="mdi mdi-menu"></i>Üst Menü
						</button>

						<div class="collapse navbar-collapse" id="toptoggnav">

							<div class="col-lg-2">
								<ul>
							<?php if ($options['opt-facebook-url']) {?><li><a target="_blank" href="<?php echo $options['opt-facebook-url'] ?>"><i class="mdi mdi-facebook"></i></a></li><?php } ?>
							<?php if ($options['opt-twitter-url']) {?><li><a target="_blank" href="<?php echo $options['opt-twitter-url'] ?>"><i class="mdi mdi-twitter"></i></a></li><?php } ?>
							<?php if ($options['opt-pinterest-url']) {?><li><a target="_blank" href="<?php echo $options['opt-pinterest-url'] ?>"><i class="mdi mdi-pinterest"></i></a></li><?php } ?>
							<?php if ($options['opt-google-url']) {?><li><a target="_blank" href="<?php echo $options['opt-google-url'] ?>"><i class="mdi mdi-google-plus"></i></a></li><?php } ?>
							<?php if ($options['opt-linkedin-url']) {?><li><a target="_blank" href="<?php echo $options['opt-linkedin-url'] ?>"><i class="mdi mdi-linkedin"></i></a></li><?php } ?>
								</ul>
							</div>

							<div class="col-lg-7">
								<ul class="text-center">
									<li><a href="#"><i class="mdi mdi-map-marker color-yellow"></i> <?php echo $options['opt-site-adres'] ?></a></li>
									<li><a href="#"><i class="mdi mdi-email color-yellow"></i> <?php echo $options['opt-site-mail'] ?></a></li>
									<li><a href="#"><i class="mdi mdi-phone-in-talk color-yellow"></i> <?php echo $options['opt-site-tel'] ?></a></li>
								</ul>
							</div>

							<div class="col-lg-3">
								<a href="<?php echo $options['opt-url-subheader'] ?>" class="btn bg-yellow btn-block"><?php echo $options['opt-button-subheader'] ?></a>
							</div>

						</div>
					</nav>

				</div>
			</div>
		</div>
	</div>
	<!-- END TOP HEADER -->

	<!-- START HEADER -->
	<div id="header">
		<div class="container">

			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg">

				<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
					<img src="<?php echo $options['opt-media-logo']['url'] ?>" alt="<?php bloginfo('name'); ?>" style="max-width:110px;" />
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headmainmenu" aria-controls="headmainmenu" aria-expanded="false" aria-label="Toggle navigation">
					<i class="mdi mdi-menu"></i> Menu
				</button>

          <?php
            wp_nav_menu([
       'menu'            => 'top',
       'theme_location'  => 'header-menu',
       'container'       => 'div',
       'container_id'    => 'headmainmenu',
       'container_class' => 'collapse navbar-collapse',
       'menu_id'         => '',
       'menu_class'      => 'navbar-nav ml-auto',
       'depth'           => 2,
       'fallback_cb'     => 'bs4navwalker::fallback',
       'walker'          => new bs4navwalker()
      ]);
     ?>
			</nav>
		</div>
	</div>


	<!-- END HEADER -->
