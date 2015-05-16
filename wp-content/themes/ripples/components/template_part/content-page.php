<?php

$post_id = isset( $post_id ) ? $post_id : get_the_ID();

if ( !empty( $value ) && function_exists( 'get_field' ) && $post_id ) {
	// check if the flexible content field has rows of data
	if( have_rows( $value, $post_id ) ) :
		// loop through the rows of data
		while ( have_rows( $value ) ) : the_row();
			inc('layouts', $value, get_row_layout(), '', 'includes/acf');
		endwhile;
	else :
		// no layouts found
	endif;

} else {
	//default layout ($value is null) or fallback if acf is not installed
	inc('molecule', 'page-header');
	the_content();
	wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ripples'), 'after' => '</p></nav>']);
}
