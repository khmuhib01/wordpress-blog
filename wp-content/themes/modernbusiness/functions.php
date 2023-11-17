<?php

//titile support

add_theme_support('title-tag');

// add css and js

add_action('wp_enqueue_scripts', 'mb_scripts');
function mb_scripts()
{
    //css
    wp_enqueue_style('mb-bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', array(), '1.0');
    wp_enqueue_style('mb-styles', get_theme_file_uri('/css/styles.css'), array('mb-bootstrap-icons'), '1.0');

    //js
    wp_enqueue_script('mb-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), '1.0', true);
    wp_enqueue_script('mb-scripts', get_theme_file_uri('/js/scripts.js'), array('mb-bootstrap'), '1.0', true);
}

// register menu



function register_my_menu()
{
    register_nav_menus(array(
        'main_menu' => __('Main Menu'),
        'footer_menu' => __('Footer Menu'),
    ));
}
add_action('init', 'register_my_menu');


function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
