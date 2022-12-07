<!-- START APPOINTMENT -->
<?php $appointment = $options['opt-appointment-setting'] ?>
<div id="appointment" style="background:url(<?php echo $appointment['opt-appointment-background']['url']  ?>);background-size:cover;background-attachment:fixed">
  <div class="container">
    <div class="row d-flex align-items-center position-relative">

      <div class="col-lg-8">
        <div class="appointment-bg">

            <div class="row d-flex align-items-center">

              <div class="col-lg-12 d-flex text-center">
                <div class="section-start-col w-100">
                  <div>
                    <h2 class="m-0 heading-icon"><?php echo $appointment['opt-appointment-title'] ?></h2>
                  </div>
                </div>
              </div>
            <div class="col-md-12" style="justify-content:center;display:flex;">
              <?php echo do_shortcode('[contact-form-7 id="'.$appointment['opt-appointment-shortcode'].'" title="İletişim formu 1"]') ?>
            </div>


            </div>
        </div>
      </div>

      <div class="col-lg-4 appointment-right">
        <div class="appointment-right-c">
          <div class="text-center">
            <h2 class="heading-icon"><?php echo $appointment['opt-appointment-help'] ?></h2>
            <h5><?php echo $appointment['opt-appointment-phone'] ?></h5>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END APPOINTMENT -->
