<?php
/*********************************************************************************************
PORTFOLIO 
*********************************************************************************************/	
/*
 * Add a portfolio custom post type.
 */
add_action('init', 'create_wowt_portfolio');
function create_wowt_portfolio() 
{
  $labels = array(
    'name' => 'Portfolio', 'portfolio',
    'singular_name' => 'Portfolio', 'portfolio',
    'add_new' => 'Add New', 'portfolio',
    'add_new_item' => 'Add New Portfolio Item',
    'edit_item' => 'Edit Item',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'search_items' => 'Search Items',
    'not_found' =>  'No items found',
    'not_found_in_trash' => 'No items found in Trash', 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'menu_icon' => get_template_directory_uri() . '/assets/img/p.png',
    'supports' => array('title','editor','thumbnail','excerpt', 'comments')
  ); 
  register_post_type('portfolio',$args);
}

/*
 * Add taxonomy (filter portfolio categories)
 */
register_taxonomy( "portfolio-categories", 
	array( 	"portfolio" ), 
	array( 	"hierarchical" => true,
			"labels" => array('name'=>"Filter",'add_new_item'=>"Add New Category"), 
			"singular_label" => "Category", 
			"rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
							'with_front' => false)
		 ) 
);


/*********************************************************************************************
SLIDER
*********************************************************************************************/	
/*
 * Add Sliders
 */
add_action('init', 'create_wow_slider');
function create_wow_slider() 
{
  $labels = array(
		'name' => 'Sliders', 'wowslider',
		'singular_name' => 'Slider', 'wowslider',
		'add_new' => 'Add New', 'Slider',
		'add_new_item' => 'Add New Slider',
		'edit_item' => 'Edit Slider',
		'new_item' => 'New Slider',
		'all_items' => 'All Sliders',
		'view_item' => 'View Slider',
		'search_items' => 'Search Slider',
		'not_found' =>  'No Sliders found',
		'not_found_in_trash' => 'No Sliders found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Wow Sliders'
  );
  $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => get_template_directory_uri() . '/assets/img/s.png',
		'supports' => array( 'title' )
  ); 
  register_post_type('wowslider',$args);
}







/*********************************************************************************************
NEXT
*********************************************************************************************/
?>