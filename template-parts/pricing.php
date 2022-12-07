<!-- START PACKAGES -->
<?php $i =0; $pricing = $options['home-packet-setting'];?>
<div id="packages">
  <div class="container">
    <div class="row d-flex align-items-center">

      <div class="col-lg-12 d-flex text-center">
        <div class="section-start-col w-50">
          <div class="float-left">
            <h2 class="heading-icon"><?php echo $options['home-packet-bigtitle'] ?></h2>
            <p class="m-0 color-blue"><?php echo $options['home-packet-subtitle'] ?> <i class="mdi mdi-check-circle"></i></p>
          </div>
          <div class="float-right">
            <div class="section-start-btn">
              <a href="/iletisim" class="btn bg-blue">İletişim</a>
            </div>
          </div>
        </div>
      </div>
      <?php foreach ($pricing as $n_t) {  ?>
      <div class="col-lg-4">
        <div class="package-warp">
          <div class="package-head package-head-icon package-head-icon-1 " style="background-color:<?php echo $n_t['opt-packet-color'] ?>">
            <div class="package-title">
              <h2><?php echo $n_t['home-packet-title'] ?></h2>
            </div>
            <div class="package-price">
              <h1><i class="mdi mdi-currency-try"></i> <?php echo $n_t['home-packet-pricing'] ?> <span>/ <?php echo $n_t['home-packet-pricingcont'] ?></span></h1>
            </div>
          </div>
          <div class="card">
            <ul>

              <?php

              $packet_list =$options['home-packet-setting'][$i]['home-packet-list'];
              foreach ($packet_list as $show ) {
              echo '<li><i class="mdi mdi-check mdi-24px text-success"></i> '.$show['opt-packet-list'].'</li>';
            }  ?>

            </ul>
            <div class="package-btn">
              <a href="<?php echo $n_t['home-packet-pricing'] ?>" class="btn bg-blue"><?php esc_html_e('Hemen Al', 'nova-theme');?></a>
            </div>
          </div>
        </div>
      </div>
<?php $i++;}  ?>
    </div>
  </div>
</div>
<!-- END PACKAGES -->
