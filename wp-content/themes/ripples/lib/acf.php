<?php
namespace MW\Ripples\Acf;

add_filter( 'acf/settings/save_json', __NAMESPACE__ . '\\my_acf_json_save_point' );

function my_acf_json_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/includes/acf/settings';

	// return
	return $path;

}

add_filter( 'acf/settings/load_json', __NAMESPACE__ . '\\my_acf_json_load_point' );

function my_acf_json_load_point( $paths ) {

	// remove original path (optional)
	unset( $paths[0] );

	// append path
	$paths[] = get_stylesheet_directory() . '/includes/acf/settings';


	// return
	return $paths;

}

//option page : http://www.advancedcustomfields.com/resources/options-page/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> __('Oiid settings', 'ripples'),
        'menu_title'	=> __('Oiid settings', 'ripples'),
        'menu_slug' 	=> 'oiid-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}