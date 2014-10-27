<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_mwow_';
	
	
	
/*********************************************************************************************
WOW SLIDER
*********************************************************************************************/	
	/**
	 * Repeatable Field Groups
	 */
	$meta_boxes['field_group'] = array(
		'id'         => 'field_group',
		'title'      => __( 'Create a Slider', 'cmb' ),
		'priority' => 'high',
		'show_names' => true,
		'pages'      => array( 'wowslider', ),
		'fields'     => array(
			array(
				'id'          => $prefix . 'repeat_group',
				'type'        => 'group',
				'description' => 'Guide: Create the slider by adding multiple entries. Then, to use this slider, copy the shortcode from the right sidebar and paste it into any page.',
				'options'     => array(
					'group_title'   => 'Entry {#}', // {#} gets replaced by row number
					'add_button'    => 'Add Another Entry',
					'remove_button' => 'Remove Entry',
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(		
					
				
					array(						
						'id'   => 'image',
						'type' => 'file',
					),
					
					array(
						'description' => 'Slider Height (ex:400px or leave it blank for full height image)',
						'id'   => 'sliderheight',
						'type' => 'text',
					),					
					
					array(
						'description' => 'Top Margin Text (ex: 20% or 100px or leave it blank for auto)',
						'id'   => 'image_caption_margin',
						'type' => 'text',
					),
					
					array(						
						'desc'    => 'Title',
						'id'   => 'title',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					
					array(						
						'desc'    => 'Title Color',
						'id'   => 'titlecolor',
						'type' => 'colorpicker',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					
					array(						
						'desc'    => 'Title Animation',
						'id'   => 'titleanim',
						'type'    => 'select',
						'options' => array(
							'bounce' => 'bounce',
							'bounceIn'   => 'bounceIn',
							'bounceInDown'     => 'bounceInDown',
							'bounceInLeft'     => 'bounceInLeft',
							'bounceInRight'     => 'bounceInRight',
							'bounceInUp'        => 'bounceInUp',
							'fadeInDown'     => 'fadeInDown',
							'fadeInDownBig'     => 'fadeInDownBig',
							'fadeInLeft'     => 'fadeInLeft',
							'fadeInLeftBig'     => 'fadeInLeftBig',
							'fadeInRight'     => 'fadeInRight',
							'fadeInRightBig'     => 'fadeInRightBig',
							'fadeInUp'     => 'fadeInUp',
							'fadeInUpBig'     => 'fadeInUpBig',							
							'lightSpeedIn'     => 'lightSpeedIn',
							'rotateIn'     => 'rotateIn',
							'rotateInDownLeft'   => 'rotateInDownLeft',
							'rotateInDownRight'  => 'rotateInDownRight',
							'rotateInUpLeft'     => 'rotateInUpLeft',
							'rotateInUpRight'     => 'rotateInUpRight',
							'slideInUp'     => 'slideInUp',
							'slideInDown'     => 'slideInDown',							
							'slideInLeft'     => 'slideInLeft',
							'slideInRight'     => 'slideInRight',
							'hinge'     => 'hinge',
							'rollIn'     => 'rollIn',
							'flash'     => 'flash',
							'pulse'     => 'pulse',
							'rubberBand'  => 'rubberBand',							
							'shake'     => 'shake',
							'swing'     => 'swing',
							'tada'     => 'tada',							
							'wobble'     => 'wobble',
							'zoomIn'     => 'zoomIn',
						),
						'default' => 'bounceIn',
					),

					array(						
						'description' => 'Description',
						'id'   => 'description',
						'type' => 'text',
					),
					
					array(						
						'desc'    => 'Description Color',
						'id'   => 'desccolor',
						'type' => 'colorpicker',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					
					array(
						'desc'    => 'Description Animation',
						'id'   => 'descriptionanim',
						'type'    => 'select',
						'options' => array(
							'bounce' => 'bounce',
							'bounceIn'   => 'bounceIn',
							'bounceInDown'     => 'bounceInDown',
							'bounceInLeft'     => 'bounceInLeft',
							'bounceInRight'     => 'bounceInRight',
							'bounceInUp'        => 'bounceInUp',
							'fadeInDown'     => 'fadeInDown',
							'fadeInDownBig'     => 'fadeInDownBig',
							'fadeInLeft'     => 'fadeInLeft',
							'fadeInLeftBig'     => 'fadeInLeftBig',
							'fadeInRight'     => 'fadeInRight',
							'fadeInRightBig'     => 'fadeInRightBig',
							'fadeInUp'     => 'fadeInUp',
							'fadeInUpBig'     => 'fadeInUpBig',							
							'lightSpeedIn'     => 'lightSpeedIn',
							'rotateIn'     => 'rotateIn',
							'rotateInDownLeft'   => 'rotateInDownLeft',
							'rotateInDownRight'  => 'rotateInDownRight',
							'rotateInUpLeft'     => 'rotateInUpLeft',
							'rotateInUpRight'     => 'rotateInUpRight',
							'slideInUp'     => 'slideInUp',
							'slideInDown'     => 'slideInDown',							
							'slideInLeft'     => 'slideInLeft',
							'slideInRight'     => 'slideInRight',
							'hinge'     => 'hinge',
							'rollIn'     => 'rollIn',
							'flash'     => 'flash',
							'pulse'     => 'pulse',
							'rubberBand'  => 'rubberBand',							
							'shake'     => 'shake',
							'swing'     => 'swing',
							'tada'     => 'tada',							
							'wobble'     => 'wobble',
							'zoomIn'     => 'zoomIn',
						),
						'default' => 'zoomIn',
					),
					
					array(						
						'description' => 'HTML allowed',
						'id'   => 'freearea',
						'type' => 'textarea_code',
					),
					
					
				),
			),
		),
	);
	
	
	/**
	 * GET SLIDER ID SHORTCODE
	 */
	function cf_post_id() {
    global $post;
    // Get the data
    $id = $post->ID;
    // Echo out the field
    echo '[wslider id="' . $id . '"]';
    }
    function ve_custom_meta_boxes() {
    add_meta_box('projects_refid', 'Add Shortcode:', 'cf_post_id', 'wowslider', 'side', 'high');   
    }
    add_action('add_meta_boxes', 've_custom_meta_boxes');
		
	
/*********************************************************************************************
OPTIONAL PAGE HEADER SETTINGS for individual pages
*********************************************************************************************/		
	$meta_boxes[] = array(
		'id' => 'post-meta-slider_top',		
		'title' => 'Page Header',
		'pages' => array( 'post', 'page', 'portfolio'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(				
				'name'  => 'Top Shortcode',				
				'id'    => "{$prefix}slider_top",
				'desc'  => 'example: shortcode for slider, video background etc',
				'type'  => 'textarea_code',				
				'std'   => ''
			),
			
			array(				
				'name'  => 'Disable Default Title',
				'id'    => "{$prefix}ip_no_title",
				'type'  => 'checkbox',
				'std'   => ''
			),
			
			array(
				
				'name'  => 'Use Page Header?',
				'id'    => "{$prefix}ip_active_pageheader",
				'desc'  => 'if checked, the custom fields below become active',
				'type'  => 'checkbox',				
				'std'   => ''
			),
			
			array(				
				'name'  => 'Alternative Title',				
				'id'    => "{$prefix}ip_page_title",
				'type'  => 'text',				
				'std'   => ''
			),
			
			array(
						'desc'    => 'Title Animation',
						'id'    => "{$prefix}ip_title_anim",
						'type'    => 'select',
						'options' => array(
							'bounce' => 'bounce',
							'bounceIn'   => 'bounceIn',
							'bounceInDown'     => 'bounceInDown',
							'bounceInLeft'     => 'bounceInLeft',
							'bounceInRight'     => 'bounceInRight',
							'bounceInUp'        => 'bounceInUp',
							'fadeInDown'     => 'fadeInDown',
							'fadeInDownBig'     => 'fadeInDownBig',
							'fadeInLeft'     => 'fadeInLeft',
							'fadeInLeftBig'     => 'fadeInLeftBig',
							'fadeInRight'     => 'fadeInRight',
							'fadeInRightBig'     => 'fadeInRightBig',
							'fadeInUp'     => 'fadeInUp',
							'fadeInUpBig'     => 'fadeInUpBig',							
							'lightSpeedIn'     => 'lightSpeedIn',
							'rotateIn'     => 'rotateIn',
							'rotateInDownLeft'   => 'rotateInDownLeft',
							'rotateInDownRight'  => 'rotateInDownRight',
							'rotateInUpLeft'     => 'rotateInUpLeft',
							'rotateInUpRight'     => 'rotateInUpRight',
							'slideInUp'     => 'slideInUp',
							'slideInDown'     => 'slideInDown',							
							'slideInLeft'     => 'slideInLeft',
							'slideInRight'     => 'slideInRight',
							'hinge'     => 'hinge',
							'rollIn'     => 'rollIn',
							'flash'     => 'flash',
							'pulse'     => 'pulse',
							'rubberBand'  => 'rubberBand',							
							'shake'     => 'shake',
							'swing'     => 'swing',
							'tada'     => 'tada',							
							'wobble'     => 'wobble',
							'zoomIn'     => 'zoomIn',
						),
						'default' => 'zoomIn',
					),
					
			array(			
				'desc'    => 'Title Size (example: 50px)',		
				'id'    => "{$prefix}ip_titlesize",
				'type'  => 'text',				
				'std'   => '35px'
			),
			
			array(			
				'name'  => 'Subtitle',				
				'id'    => "{$prefix}ip_page_subtitle",
				'type'  => 'text',				
				'std'   => ''
			),
			
			array(
						'desc'    => 'Subtitle Animation',
						'id'    => "{$prefix}ip_subtitle_anim",
						'type'    => 'select',
						'options' => array(
							'bounce' => 'bounce',
							'bounceIn'   => 'bounceIn',
							'bounceInDown'     => 'bounceInDown',
							'bounceInLeft'     => 'bounceInLeft',
							'bounceInRight'     => 'bounceInRight',
							'bounceInUp'        => 'bounceInUp',
							'fadeInDown'     => 'fadeInDown',
							'fadeInDownBig'     => 'fadeInDownBig',
							'fadeInLeft'     => 'fadeInLeft',
							'fadeInLeftBig'     => 'fadeInLeftBig',
							'fadeInRight'     => 'fadeInRight',
							'fadeInRightBig'     => 'fadeInRightBig',
							'fadeInUp'     => 'fadeInUp',
							'fadeInUpBig'     => 'fadeInUpBig',							
							'lightSpeedIn'     => 'lightSpeedIn',
							'rotateIn'     => 'rotateIn',
							'rotateInDownLeft'   => 'rotateInDownLeft',
							'rotateInDownRight'  => 'rotateInDownRight',
							'rotateInUpLeft'     => 'rotateInUpLeft',
							'rotateInUpRight'     => 'rotateInUpRight',
							'slideInUp'     => 'slideInUp',
							'slideInDown'     => 'slideInDown',							
							'slideInLeft'     => 'slideInLeft',
							'slideInRight'     => 'slideInRight',
							'hinge'     => 'hinge',
							'rollIn'     => 'rollIn',
							'flash'     => 'flash',
							'pulse'     => 'pulse',
							'rubberBand'  => 'rubberBand',							
							'shake'     => 'shake',
							'swing'     => 'swing',
							'tada'     => 'tada',							
							'wobble'     => 'wobble',
							'zoomIn'     => 'zoomIn',
						),
						'default' => 'zoomIn',
					),
					
			array(				
				'name'  => 'Use Down Arrow?',			
				'id'    => "{$prefix}ip_downarrow_pageheader",
				'type'  => 'checkbox',				
				'std'   => ''
			),
			
			array(
				'name'  => 'Additional Text?',
				'description' => 'HTML & Shortcodes allowed',
				'id'    => "{$prefix}ip_freearea",
				'type' => 'textarea_code',
			),
			
			
			array(				
				'name'  => 'Background Color',
				'desc'  => '',				
				'id'    => "{$prefix}ip_bg_color",
				'type'  => 'colorpicker',				
				'std'   => ''
			),
			
			array(				
				'name'  => 'Text Color',
				'desc'  => '',				
				'id'    => "{$prefix}ip_text_color",
				'type'  => 'colorpicker',				
				'std'   => ''
			),
			
			array(				
				'name'  => 'Opacity',	
				'desc'  => 'Enter a value between 0.0 and 0.9',
				'id'    => "{$prefix}ip_page_transparancy",
				'type'  => 'text',				
				'std'   => '0.8'
			),
			
			array(				
				'name'  => 'Padding',	
				'desc'  => 'Default is 80px',
				'id'    => "{$prefix}ip_header_padding",
				'type'  => 'text_small',				
				'std'   => '80px'
			),
			
			array(
				'name'  => 'Parallax Image',
				'id'    => "{$prefix}ip_background_url",
				'type'  => 'file_list',
				'preview_size' => array( 100, 100 ),
			),
			
			array(
				'name'  =>  'Upload Texture?',
				'id'    => "{$prefix}ip_use_texture",
				'type'  => 'file_list',
				'preview_size' => array( 50, 50 ),
			),
			
		)
	);
	

	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
