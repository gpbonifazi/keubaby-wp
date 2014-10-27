<?php

if(!class_exists('WOWT_Heading')) {
	class WOWT_Heading extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Heading'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOWT_Heading', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'headingtext'     => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('headingtext') ?>">
					Heading Text
					<?php echo aq_field_input('headingtext', $block_id, $headingtext, $size = 'full') ?>
				</label>
			</p>							
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			echo '<h2 class="text-center smalltitle">
			<span>'. do_shortcode(htmlspecialchars_decode($headingtext)) .'</span>
			</h2>';
			
			
		}
		
	}
}