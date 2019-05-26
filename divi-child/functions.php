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
// End loading child theme //


// Enqueue the script allows to collapse and expand the mobile sub menu //
function collapse_mobile_menu() {
	wp_enqueue_script( 'collapse_mobile_menu', get_stylesheet_directory_uri() . '/js/mobilemenu-enhancement.js' );
}
add_action('wp_enqueue_scripts', 'collapse_mobile_menu');
// END mobile menu //

// Jetpack: display tickbox in post meta to choose if the particular post should be sent to email subscribers
function add_filter( 'jetpack_allow_per_post_subscriptions', '__return_true' );

?>