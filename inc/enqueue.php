<?php
function xobamax_resources() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('Magnific', get_template_directory_uri() . '/assets/css/magnific/magnific-popup.css');
    wp_enqueue_style('dashicon', get_template_directory_uri() . '/assets/font/css/materialdesignicons.min.css');
    wp_enqueue_style('response', get_template_directory_uri() . '/assets/css/theme-responsive.css');
    wp_enqueue_style('animatemin', get_template_directory_uri() . '/assets/css/animate.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.carousel.css');
    wp_enqueue_style('owlmin', get_template_directory_uri() . '/assets/css/owl.transitions.css');
    wp_enqueue_style('slickcss', get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'xobamax_resources');
