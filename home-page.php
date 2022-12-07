<?php /* Template Name: Ana Sayfa */ ?>
<?php get_header(); ?>
<?php
$layout = $options['home-sorter-setting']['enabled'];

if ($layout): foreach ($layout as $key=>$value) {

    switch($key) {

      case 'slider': include 'template-parts/slider.php';
      break;
      case 'service': include 'template-parts/service.php';
      break;
      case 'get-now': include 'template-parts/get-now.php';
      break;
      case 'about': include 'template-parts/about.php';
      break;
      case 'project': include 'template-parts/project.php';
      break;
      case 'appointment': include 'template-parts/appointment.php';
      break;
      case 'faq': include 'template-parts/faq.php';
      break;
      case 'blog': include 'template-parts/blog.php';
      break;
      case 'clients': include 'template-parts/clients.php';
      break;
      case 'pricing': include 'template-parts/pricing.php';
      break;

    } }

endif;
?>

<?php get_footer(); ?>
