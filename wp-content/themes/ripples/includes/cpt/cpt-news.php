<?php
/* =====================================================================
Create custom post type
====================================================================== */
$labels = array(
	'name'               => _x( 'News', 'post type general name', 'ripples' ),
	'singular_name'      => _x( 'News', 'post type singular name', 'ripples' ),
	'menu_name'          => _x( 'News', 'admin menu', 'ripples' ),
	'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'ripples' ),
	'add_new'            => _x( 'Add New', 'news', 'ripples' ),
	'add_new_item'       => __( 'Add New News', 'ripples' ),
	'new_item'           => __( 'New News', 'ripples' ),
	'edit_item'          => __( 'Edit News', 'ripples' ),
	'view_item'          => __( 'View News', 'ripples' ),
	'all_items'          => __( 'All News', 'ripples' ),
	'search_items'       => __( 'Search News', 'ripples' ),
	'parent_item_colon'  => __( 'Parent News:', 'ripples' ),
	'not_found'          => __( 'No news found.', 'ripples' ),
	'not_found_in_trash' => __( 'No news found in Trash.', 'ripples' )
);

$args = array(
	'labels'             => $labels,
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'news' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'news', $args );

function change_news_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'book' == $screen->post_type ) {
          $title = __( 'Enter news title here', 'ripples' );
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_news_title' );