<?php

namespace MW\Ripples\Assets;

function assets() {
	$themeURI = get_template_directory_uri();
	$vendorFolder = $themeURI . '/bower_components/';
	$assetFolder = $themeURI . '/assets/';
	$distFolder = $themeURI . '/dist/';

	wp_enqueue_style( 'ripples_css', $distFolder. 'styles/main.css' , false, null );

	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
	}

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'modernizr', $distFolder . 'scripts/modernizr.js', [ ], null, false );

	if ( WP_ENV !== 'development' ) {
		wp_enqueue_script( 'ripples_rjs', $assetFolder . 'scripts/require.js', [ ], null, true );
		wp_enqueue_script( 'ripples_js', $assetFolder . 'scripts/main.js' , [ ], null, true );
	} else {
		wp_enqueue_script( 'ripples_js_min', $distFolder .  'scripts/main.min.js' , [ ], null, true );
	}

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100 );

