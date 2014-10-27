<?php
/** Parallax block **/

if(!class_exists('WOW_Grayend')) {
	class WOW_Grayend extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Gray Area End'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Grayend', $block_options);
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
			
			echo '
				</div></div></section>
			';	
			
		}
		
	}
}