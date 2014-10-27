<?php
/** Intronote block **/

if(!class_exists('WOW_Break')) {
	class WOW_Break extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Space'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Break', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'height'     => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>			
			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('break') ?>">
					Enter a number to add some space between blocks( ex: 20, 30, 40, 60 etc )
					<?php echo aq_field_input('break', $block_id, $break, $size = 'full') ?>
				</label>
			</p>				
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '<div style="height: '.$break.'px;"></div>';
			
		}
		
	}
}