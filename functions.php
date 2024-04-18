<?php
function enqueue_custom_styles() {
    wp_enqueue_style('nathalie-mota-style', get_stylesheet_uri(), array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles'); 



function enqueue_custom_script() {
    wp_enqueue_script('simple-parallax', 'https://cdnjs.cloudflare.com/ajax/libs/simple-parallax-js/5.6.2/simpleParallax.min.js', array(), '9.4.1', true);
    wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/js/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/js/swiper/swiper-bundle.min.js', array('jquery'), '', true);
    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_script' );
