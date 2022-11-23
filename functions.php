<?php

/*
* Enqueue scripts and styles.
*/

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'app.css', get_template_directory_uri() . '/dist/app.css');
    // wp_enqueue_script( 'app.js', get_template_directory_uri() . '/dist/app.js', ['wp-hooks'], '1.0.0', true);
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
	register_post_type('projects',
		array(
			'labels'      => array(
				'name'          => __('Projects', 'textdomain'),
				'singular_name' => __('Project', 'textdomain'),
			),
            'public'      => true,
            'has_archive' => true,
            'menu_position' => 4,
            'show_in_rest' => true,
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);

	add_theme_support('editor-styles');
	add_editor_style( 'dist/app.css' );

	add_action( 'enqueue_block_editor_assets', 	function() {
		wp_enqueue_script( 'app.js', get_template_directory_uri() . '/dist/app.js', ['wp-hooks'], '1.0.0', true);
	});
});