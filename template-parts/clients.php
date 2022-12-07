<!-- START CLIENTS -->
<div id="clients">
  <div class="row d-flex align-items-center">

    <div class="col-lg-12">
      <div class="clients-carousel row">
        <?php
        $layout = $options['opt-clients-setting'];
        foreach ($layout as $clients) {

        echo '
        <div class="client-item">
          <img src="'.$clients['opt-clients-image']['url'].'" alt="" />
        </div>';}  ?>
      </div>
    </div>

  </div>
</div>
<!-- END CLIENTS -->
