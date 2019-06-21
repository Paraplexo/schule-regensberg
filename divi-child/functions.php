<?php
// Load child theme instead of @import in style.css because of better performance //
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

// WPForms customization //

/** Change the date picker to a local format (e.g. DE ) **/
function wpf_dev_datepicker_locale() {
	wp_enqueue_script( 
		'wpforms-datepicker-locale', 
	//	Use the below line if script should be lodaded via CDN network //
	//	'https://npmcdn.com/flatpickr@4.6.1/dist/l10n/de.js', //
	//	Use the below line of loading script locally. The script mus be placed in the child themes /js dir //
		get_stylesheet_directory_uri() . '/js/de.js',
		array( 'wpforms-flatpickr' ), 
		null, 
		true
	);
}
add_action( 'wp_enqueue_scripts', 'wpf_dev_datepicker_locale' );

function wpf_dev_datepicker_apply_locale() {
	?>
	<script type="text/javascript">
    jQuery(document).ready(function(){
		flatpickr.localize(Flatpickr.l10ns.de);
		flatpickr('.wpforms-datepicker');
     });
	</script>
	<?php
}
add_action( 'wpforms_wp_footer_end', 'wpf_dev_datepicker_apply_locale', 30 );

/**
 * Add additional formats for the Date field date picker.
 *
 * @param array $formats
 * @return array
 */
function wpf_dev_date_field_formats( $formats ) {

	// Item key is JS date character - see https://flatpickr.js.org/formatting/
	// Item value is in PHP format - see http://php.net/manual/en/function.date.php

	// Adds new format Tuesday, 14. May 2019
	$formats['l, j F Y'] = 'l, j F Y';

	return $formats;
}
add_filter( 'wpforms_datetime_date_formats', 'wpf_dev_date_field_formats' );

// END WPForms customization //
?>