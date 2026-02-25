<?php

require_once(__DIR__ . '/includes/helpers.php');
require_once(__DIR__ . '/includes/yoast-modify.php');
require_once(__DIR__ . '/acf-blocks/init.php');
require_once(__DIR__ . '/includes/form-handler.php');

/* Подключаем стили и скрипты */
add_action( 'wp_enqueue_scripts', function () {
    wp_deregister_script( 'jquery' );

    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'main-media-style', get_template_directory_uri() . '/assets/css/media.css' );

    wp_enqueue_style( 'main-fancy', get_template_directory_uri() . '/assets/libs/jquery.fancybox.min.css');
    wp_enqueue_style( 'main-jq-modal', get_template_directory_uri() . '/assets/libs/jquery.modal.css');
    wp_enqueue_style( 'main-slick', get_template_directory_uri() . '/assets/libs/slick.css');
    wp_enqueue_style( 'main-slick-theme', get_template_directory_uri() . '/assets/libs/slick-theme.css');
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/custom.css');

    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/libs/jquery-3.5.1.min.js');
    wp_enqueue_script( 'main-fancy', get_template_directory_uri() . '/assets/libs/jquery.fancybox.min.js');
    wp_enqueue_script( 'main-masked', get_template_directory_uri() . '/assets/libs/jquery.maskedinput.min.js');
    wp_enqueue_script( 'main-slick', get_template_directory_uri() . '/assets/libs/slick.min.js');
    wp_enqueue_script( 'main-jq-modal', get_template_directory_uri() . '/assets/libs/jquery.modal.min.js');

    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0.0', array( 'strategy' => 'defer' ));
    wp_enqueue_script( 'main-cookie', get_template_directory_uri() . '/assets/js/cookie.js');

    wp_enqueue_script('ajax-form', get_template_directory_uri() . '/assets/ajax/form.js', array('jquery'));
    wp_localize_script('ajax-form', 'ajax_form', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
});

/* Регистрация меню */
add_action( 'after_setup_theme', function () {
    register_nav_menu( 'header_menu', 'Header Menu' );
    register_nav_menu( 'footer_1', 'Footer Menu 1' );
    register_nav_menu( 'footer_2', 'Footer Menu 2' );
});

/* Поддержка изображений для записей */
add_theme_support('post-thumbnails');
add_theme_support('title-tag');


add_action('after_setup_theme', function () {
    add_image_size( 'type_services', 600, 200, true);
    add_image_size( 'post_prev', 1300, 400, true);
    add_image_size( 'doc_prev', 270, 380, true);
    add_image_size( 'doc_full', 600, 810, true);
    add_image_size( 'solution_card', 390, 220, true);
});

add_action('init', function () {
    add_post_type_support('service', array('excerpt'));
});


add_action('admin_enqueue_scripts', function ($hook) {
    if ('post.php' != $hook && 'post-new.php' != $hook) { return; }
    wp_enqueue_style('nova-admin-styles', get_template_directory_uri() . '/assets/css/admin-acf-post.css');
});