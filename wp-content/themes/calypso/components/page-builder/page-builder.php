<?php

if(class_exists('AQ_Page_Builder')) {

    define('AQPB_CUSTOM_DIR', get_template_directory() . '/components/page-builder/');
    define('AQPB_CUSTOM_URI', get_template_directory_uri() . '/components/page-builder/');

    //include the block files
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-accordion.php');
    require_once(AQPB_CUSTOM_DIR . 'blocks/wow-break.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-team.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-intronote.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-services.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-features.php');	
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-quotes.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-services2.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-recentportfolio.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-recentposts.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-cta.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-counter.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-heading.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-imagecarousel.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-timeline.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-toggle.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-pricing.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-testimonials.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-portfolioindex.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-contactform.php');
	
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-grayareabegin.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-grayareaend.php');
	
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-parallaxbegin.php');
	require_once(AQPB_CUSTOM_DIR . 'blocks/wow-parallaxend.php');
	
	

    //register the blocks
	aq_register_block('WOWT_Accordion');
	aq_register_block('WOW_Break');
    aq_register_block('WOW_Team');
	aq_register_block('WOW_Intronote');
	aq_register_block('WOW_Services');
	aq_register_block('WOW_Features');	
	aq_register_block('WOW_Quotes');
	aq_register_block('WOW_Services2');
	aq_register_block('WOW_Recentportfolio');
	aq_register_block('WOW_Recentposts');
	aq_register_block('WOW_Calltoaction');
	aq_register_block('WOW_Counter');
	aq_register_block('WOWT_Heading');
	aq_register_block('WOWT_Imagecarousel');
	aq_register_block('WOWT_Timeline');
	aq_register_block('WOWT_Toggle');
	aq_register_block('WOWT_Pricing');
	aq_register_block('WOW_Testimon');
	aq_register_block('WOWT_Portfolioindex');
	aq_register_block('WOWT_Contactform');

	aq_register_block('WOW_Graybegin');
	aq_register_block('WOW_Grayend');
	
	aq_register_block('WOW_Parallaxbegin');
	aq_register_block('WOW_Parallaxend');
	
	
	
	
	
	
	

    //custom block css/js
    add_action('aq-page-builder-view-enqueue', 'my_custom_block_css');
    function my_custom_block_css() {
        wp_register_style( 'my-custom-block-css',  AQPB_CUSTOM_URI . 'css/blocks-custom-css.css', array(), time(), 'all');
        wp_enqueue_style('my-custom-block-css');
    }

}