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
* Init
*/
add_action('init', function () {
	add_theme_support('editor-styles');
	add_editor_style( 'dist/editor.css' );


	/*
	* Remove default image sizes
	*/
	add_filter( 'intermediate_image_sizes', 'remove_default_img_sizes', 10, 1);

	function remove_default_img_sizes( $sizes ) {
		$targets = ['thumb','medium', 'medium_large','large', '1536x1536', '2048x2048'];

		foreach($sizes as $size_index=>$size) {
			if(in_array($size, $targets)) {
			unset($sizes[$size_index]);
			}
		}

		return $sizes;
	}


	/*
	* Add custom image sizes
	*/
	add_image_size( 'card', 791, 446, true );

	
	/*
	* Register captain block pattern category
	*/
	register_block_pattern_category('captain', array( 'label' => __( 'Captain', 'captain-blocks' )));


	/*
	* Allow custom image sizes to be selected by Gutenberg blocks
	*/
	add_filter( 'image_size_names_choose', 'custom_image_sizes' );
 
	function custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'card' => __( 'Card' ),
		) );
	}
});