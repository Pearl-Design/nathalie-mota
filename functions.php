<?php
// Enqueue styles and scripts
function nathalie_mota_enqueue_scripts_and_styles() {
    // Enqueue theme style
    wp_enqueue_style('nathalie-mota-style', get_stylesheet_uri(), array(), '1.0');

    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue custom script
    wp_enqueue_script('custom_script', get_template_directory_uri() . '/js/animation.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_scripts_and_styles');
