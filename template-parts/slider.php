<!-- START SLIDER -->
<div id="slider-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="8000">
  <ol class="carousel-indicators">
    <?php
    $i = 0;
    $layout = $options['opt-manset-ana-design'];
    if ($layout): foreach ($layout as $slide_manset) {

      ?>
    <li data-target="#slider-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i === 0): ?>active<?php endif; ?> "></li>

    <?php  $i++; ?>
    <?php } endif; ?>
  </ol>

  <div class="carousel-inner" role="listbox">
    <?php
    $i = 0;
    $layout = $options['opt-manset-ana-design'];
    if ($layout): foreach ($layout as $slide_manset) {

      ?>
    <!-- Slider 1 -->
    <div class="carousel-item <?php if($i === 0): ?>active<?php endif; ?> " style="background-image: url('<?php echo $slide_manset['opt-slider-image']['url'] ?>')">
      <div class="carousel-caption">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <h5 class="animated bounceInLeft"><?php echo $slide_manset['opt-ust-baslik'] ?></h5>
              <h1 class="color-blue animated bounceInRight"><?php echo $slide_manset['opt-buyuk-baslik'] ?></h1>
              <p class="animated bounceInRight"><?php echo $slide_manset['opt-slider-aciklama'] ?></p>
              <div class="slider-btn animated fadeInUp">
                <a href="<?php echo $slide_manset['opt-slider-buttonurl'] ?>" class="btn bg-blue"><?php echo $slide_manset['opt-slider-button'] ?></a>
                <a href="/iletisim" class="btn bg-white-default">İletişim</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php  $i++; ?>
    <?php } endif; ?>
  </div>

  <!-- Previous Btn -->
  <a class="carousel-control-prev" href="#slider-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

  <!-- Next Btn -->
  <a class="carousel-control-next" href="#slider-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

<!-- END SLIDER -->
