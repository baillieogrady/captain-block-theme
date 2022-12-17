<?php

/*
* Enqueue scripts and styles.
*/

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'app.css', get_template_directory_uri() . '/dist/app.css');
    wp_enqueue_script( 'app.js', get_template_directory_uri() . '/dist/app.js');
});

/*
* Remove default styling
*/

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/*
 * Custom post types 
*/

add_action('init', function () {
	add_theme_support('editor-styles');
	add_editor_style( 'dist/app.css' );
});