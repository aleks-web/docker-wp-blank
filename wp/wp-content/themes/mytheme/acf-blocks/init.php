<?php

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_form',
            'title'             => 'Nova Форма',
            'description'       => 'Блок форма',
            'render_template'   => realpath(__DIR__ . '/nova_form/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_contacts',
            'title'             => 'Nova Контакты',
            'description'       => 'Блок с контактами',
            'render_template'   => realpath(__DIR__ . '/nova_contacts/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_materials',
            'title'             => 'Nova Материалы',
            'description'       => 'Блок с материалами',
            'render_template'   => realpath(__DIR__ . '/nova_materials/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_seo_block',
            'title'             => 'Nova SEO блок',
            'description'       => 'Блок с SEO',
            'render_template'   => realpath(__DIR__ . '/nova_seo_block/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_main',
            'title'             => 'Nova Главный блок',
            'description'       => 'Главный блок',
            'render_template'   => realpath(__DIR__ . '/nova_main/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_partners',
            'title'             => 'Nova Партнёры',
            'description'       => 'Блок Партнёров',
            'render_template'   => realpath(__DIR__ . '/nova_partners/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_solutions',
            'title'             => 'Nova Решения',
            'description'       => 'Блок Решения',
            'render_template'   => realpath(__DIR__ . '/nova_solutions/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_steps',
            'title'             => 'Nova Шаги',
            'description'       => 'Блок Шаги',
            'render_template'   => realpath(__DIR__ . '/nova_steps/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_documents',
            'title'             => 'Nova Все документы',
            'description'       => 'Блок Все документы',
            'render_template'   => realpath(__DIR__ . '/nova_documents/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_advantages',
            'title'             => 'Nova Наши преимущества',
            'description'       => 'Блок Наши преимущества',
            'render_template'   => realpath(__DIR__ . '/nova_advantages/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_licenses',
            'title'             => 'Nova Лицензии',
            'description'       => 'Блок Лицензии',
            'render_template'   => realpath(__DIR__ . '/nova_licenses/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});

add_action( 'acf/init', function () {
    if( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type(array(
            'name'              => 'nova_category_services',
            'title'             => 'Nova Категории услуг',
            'description'       => 'Блок Категории услуг',
            'render_template'   => realpath(__DIR__ . '/nova_category_services/block.php'),
            'category'          => 'Шаблон NOVA',
        ));
    }
});