<?php
// Load child theme instead of @import in style.css because it's performing better //
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Load Google font poppins //
function wpb_add_google_fonts() { 
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


?>