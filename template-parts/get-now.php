<!-- START GET NOW -->
<?php
$layout = $options['home-get-now'];
foreach ($layout as $getnow) {
echo '<div id="get-now" class="bg-blue mt-2">
  <div class="container ">
    <div class="row d-flex align-items-center">

      <div class="col-lg-8 item-col">
        <h2>'.$getnow['opt-get-now-title'].'</h2>
      </div>

      <div class="col-lg-4 item-col">
        <div class="get-now-right">
          <ul>
            <li><a href="'.$getnow['opt-get-now-buttonurl'].'" class="btn bg-white-default btn-block">'.$getnow['opt-get-now-button'].'</a></li>
            <li><a href="/iletisim" class="btn bg-yellow btn-block">İletişim</a></li>
          </ul>
        </div>
      </div>

    </div>
  </div>

</div>';} ?>
<!-- END GET NOW -->
