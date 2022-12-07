<?php $about = $options['opt-about-setting']; ?>
<style media="screen">
	#about-us:before{background-image: url(<?php echo $about['opt-about-image']['url'] ?>);}
</style>
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
						<li><a href="<?php echo $about['opt-about-buttonurl'] ?>" class="btn bg-blue"><?php echo $about['opt-about-button-text'] ?></a></li>
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
