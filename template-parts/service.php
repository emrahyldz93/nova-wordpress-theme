<!-- START SERVICES ITEMS -->
	<div id="services-items">
		<div class="container">
			<div class="row d-flex align-items-center">

				<div class="col-lg-12 d-flex text-center">
					<div class="section-start-col w-50">
						<div class="float-left">
							<h2 class="heading-icon"><?php echo $options['opt-anabaslik-service']; ?></h2>
              <p class="m-0 color-blue"><?php echo $options['opt-altbaslik-service']; ?> <i class="mdi mdi-check-circle"></i></p>
						</div>
						<div class="float-right">
							<div class="section-start-btn">
								<a href="<?php echo $options['opt-baslik-buttonurl-service']; ?>" class="btn bg-blue"><?php echo $options['opt-baslik-button-service']; ?></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="service-carousel row">
            <?php
            $layout = $options['ana-sayfa-design-service'];
           foreach ($layout as $n_t) {


					echo '	<div>
							<div class="service-item">
								<div class="service-item-img">
									<img src="'.$n_t['opt-service-image']['url'].'" alt="'.$n_t['opt-service-title'].'" class="w-100" />
									<i class="'.$n_t['opt-service-icon'].' service-item-icon text-white"></i>
								</div>
								<div class="card">
									<h5>'.substr($n_t['opt-title-service'], 0 ,50).'</h5>
									<p>'.substr($n_t['opt-content-service'], 0, 100).'...</p>
									<a href="'.$n_t['opt-buttonurl-service'].'" class="btn btn-sm bg-blue">Teklif İste</a>
								</div>
							</div>
						</div>
          ';}  ?>


					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END SERVICES ITEMS -->
