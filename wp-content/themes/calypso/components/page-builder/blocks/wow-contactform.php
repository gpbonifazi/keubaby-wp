<?php
/** Intronote block **/

if(!class_exists('WOWT_Contactform')) {
	class WOWT_Contactform extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Contact Form'),
				'size' => 'span6',
			);
			
			//create the block
			parent::__construct('WOWT_Contactform', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'email'     => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>			
			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('email') ?>">
					E-mail address
					<?php echo aq_field_input('email', $block_id, $email, $size = 'full') ?>
				</label>
			</p>
			
				
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			echo do_shortcode('[wow_contact email='. do_shortcode(htmlspecialchars_decode($email)) .']');
			
			
		}
		
	}
}