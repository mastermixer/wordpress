<?php

namespace MW\Ripples\Extras;

use MW\Ripples\Config;

/**
 * Add <body> classes
 */
function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	// Add class if sidebar is active
	if ( Config\display_sidebar() ) {
		$classes[] = 'sidebar-primary';
	}

	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'ripples' ) . '</a>';
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );

function my_rewrite_flush() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\\my_rewrite_flush' );


/**
 * Customize the wysiwyg editor
 * Recommended additional plugin : https://wordpress.org/plugins/tinymce-advanced/
 */
//add_filter( 'tiny_mce_before_init', 'custom_mce_before_init' );
function custom_mce_before_init( $settings ) {
	$style_formats = array(
		array(
			'title'  => __( 'Paragraph', 'ripples' ),
			'format' => 'p',
		),
		array(
			'title'  => __( 'Heading 2', 'ripples' ),
			'format' => 'h2',
		),
		array(
			'title'  => __( 'Heading 3', 'ripples' ),
			'format' => 'h3',
		),
		array(
			'title'  => __( 'Heading 4', 'ripples' ),
			'format' => 'h4',
		),
		array(
			'title' => __( 'Wysiwyg.Formats', 'ripples' ),
			'items' => array(
				/* Inline style that only applies to links */
				array(
					'title'    => __( 'Wysiwyg.Some class', 'ripples' ), /* Label in "Formats" menu */
					'selector' => 'p', /* this style can ONLY be applied to existing <a> elements in the selection! */
					'classes'  => 'some-class' /* class to add */
				),
			),
		),
	);

	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;
}

function ctaButton($atts, $content = 'button name') {
	extract(shortcode_atts(array(
      'href' => '/',
   	), $atts));

	$return_string = '<div class="oiid-btn"><a href="' . $href . '"><span>' . $content . '</span></a>';
	$return_string .= '</div>';
	return $return_string;
}
add_shortcode('cta-button', __NAMESPACE__ . '\\ctaButton');

function register_button( $buttons ) {
   array_push( $buttons, "|", "ctabutton" );
   return $buttons;
}

function add_plugin( $plugin_array ) {
   $plugin_array['ctabutton'] = get_template_directory_uri() . '/assets/scripts/cta-button.js';
   //echo $plugin_array['ctabutton'];
   return $plugin_array;
}

function make_cta_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', __NAMESPACE__ . '\\add_plugin' );
      add_filter( 'mce_buttons', __NAMESPACE__ . '\\register_button' );
   }

}
add_action('init', __NAMESPACE__ . '\\make_cta_button');