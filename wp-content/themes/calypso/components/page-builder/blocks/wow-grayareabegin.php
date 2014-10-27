<?php
/** Parallax block **/

if(!class_exists('WOW_Graybegin')) {
	class WOW_Graybegin extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Gray Area Begin'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Graybegin', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'paddingtop' => '',
				'paddingbottom' => '',
				'margintop' => '',
				'marginbottom' => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
		
			<p class="description half">
				<label for="<?php echo $this->get_field_id('paddingtop') ?>">
					Padding Top  (example: 20px) (optional)<br/>
					<?php echo aq_field_input('paddingtop', $block_id, $paddingtop, $size = 'small') ?>
				</label>
			</p>
			
			<p class="description half-last">
				<label for="<?php echo $this->get_field_id('margintop') ?>">
					Margin Top  (example: -20px or 20px) (optional)
					<?php echo aq_field_input('margintop', $block_id, $margintop, $size = 'small') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('paddingbottom') ?>">
					Padding Bottom (example: 20px) (optional)<br/>
					<?php echo aq_field_input('paddingbottom', $block_id, $paddingbottom, $size = 'small') ?>
				</label>
			</p>

			
			<p class="description half-last">
				<label for="<?php echo $this->get_field_id('marginbottom') ?>">
					Margin Bottom (example: -20px or 20px) (optional)
					<?php echo aq_field_input('marginbottom', $block_id, $marginbottom, $size = 'small') ?>
				</label>
			</p>
			
			
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '
			<section class="grayarea" style="max-width: 1200px; margin:0px auto; overflow-x: hidden;margin-left:-2.96%; margin-right:-2.97%;margin-top:'.$margintop.';margin-bottom:'.$marginbottom.';padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';">

				<div class="container">
			
					<div class="parallax-content">

			';	
			
		}
		
	}
}