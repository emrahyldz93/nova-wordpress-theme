<!-- START FAQ -->
<div id="faq">
  <div class="container">
    <div class="row">

      <div class="col-lg-7">
        <div id="accordion" class="faq-accordion">

          <div class="col-lg-12 d-flex text-center">
            <div class="section-start-col w-100">
              <div>
                <h2 class="m-0 <?php echo $options['opt-global-icons'] ?>"><?php echo $options['home-faq-bigtitle'] ?></h2>
              </div>
            </div>
          </div>

          <?php
          $i = 0;
          $layout = $options['home-faq-setting'];
          foreach ($layout as $faq) { ?>

          <div class="collapse-head">
            <div class="collapse-btn">
              <button class="collapsed  " data-toggle="collapse" data-target="#content-<?php echo $i ?>" aria-expanded="<?php if($i === 0){ echo "true";} else {echo "false";}  ?>"><i class="mdi mdi-plus mdi-24px"></i><?php echo $faq['home-faq-title'] ?></button>
            </div>
            <div id="content-<?php echo $i ?>" class="collapse <?php if($i === 0): ?>show<?php endif; ?>" data-parent="#accordion">
              <div>
                <p><?php echo $faq['home-faq-content'] ?></p>
              </div>
            </div>
          </div>
          <?php   $i ++;} ?>

    </div>
      </div>

      <div class="col-lg-5">
        <div class="faq-right-img">
          <img src="<?php echo $options['home-fag-right-image']['url'] ?>" alt="<?php echo $options['home-faq-rigth-image']['alt'] ?>" />
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END FAQ -->
