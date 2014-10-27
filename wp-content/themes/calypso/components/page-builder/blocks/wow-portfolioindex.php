<?php
/** Intronote block **/

if(!class_exists('WOWT_Portfolioindex')) {
	class WOWT_Portfolioindex extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Portfolio Items'),
				'size' => 'span6',
			);
			
			//create the block
			parent::__construct('WOWT_Portfolioindex', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(

			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>			
					
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			$output = '';			
			$output  .= get_template_part( 'templates/section-portfolioblock' );		
			echo $output;
			
			
			
		}
		
	}
}