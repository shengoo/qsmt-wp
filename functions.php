<?php
/**
 * Created by PhpStorm.
 * User: sheng
 * Date: 16/8/28
 * Time: 17:42
 */


if ( ! function_exists( 'qsmt_setup' ) ) :

    function qsmt_setup(){

        /*
         * Enable support for custom logo.
         *
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 240,
            'width'       => 240,
            'flex-height' => true,
        ) );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu',      'qsmt' ),
        ) );


    }
endif; // qsmt_setup
add_action( 'after_setup_theme', 'qsmt_setup' );





/**
 * Enqueues scripts and styles.
 *
 */
function qsmt_scripts() {
    wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('jquery',get_template_directory_uri().'/js/jquery-3.1.0.min.js');
    wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/js/bootstrap.min.js');

    // Theme stylesheet.
    wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'qsmt_scripts' );



function qsmt_the_custom_logo() {

    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }

}

