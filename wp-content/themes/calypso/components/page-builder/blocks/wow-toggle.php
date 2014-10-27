<?php
/** Intronote block **/

if(!class_exists('WOWT_Toggle')) {
	class WOWT_Toggle extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Toggle'),
				'size' => 'span6',
			);
			
			//create the block
			parent::__construct('WOWT_Toggle', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'introheading'     => '',
				'introdescription'  => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>			
			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('introheading') ?>">
					Title/Question
					<?php echo aq_field_input('introheading', $block_id, $introheading, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('introdescription') ?>">
					Details/Answer
					<?php echo aq_field_textarea('introdescription', $block_id, $introdescription, $size = 'full') ?>
				</label>
			</p>					
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo do_shortcode('[wow_toggle title="'. do_shortcode(htmlspecialchars_decode($introheading)) .'"]'. do_shortcode(htmlspecialchars_decode($introdescription)) .'[/wow_toggle]');
			
			
			
		}
		
	}
}