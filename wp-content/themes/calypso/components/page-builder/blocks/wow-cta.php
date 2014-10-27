<?php

if(!class_exists('WOW_Calltoaction')) {
	class WOW_Calltoaction extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Call to action'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Calltoaction', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'introheading'     => '',
				'introdescription'  => '',
				
				'btn1text'  => '',
				'btn1link'  => '',
				'btn1icon'  => '',
				'btn1target'  => '',
				
				'btn2text'  => '',
				'btn2link'  => '',
				'btn2icon'  => '',
				'btn2target'  => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>			
			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('introheading') ?>">
					Strong Text
					<?php echo aq_field_input('introheading', $block_id, $introheading, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('introdescription') ?>">
					Description
					<?php echo aq_field_textarea('introdescription', $block_id, $introdescription, $size = 'full') ?>
				</label>
			</p>

			<p class="description half">
				<label for="<?php echo $this->get_field_id('btn1text') ?>">
					First Button Text
					<?php echo aq_field_input('btn1text', $block_id, $btn1text, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('btn2text') ?>">
					Second Button Text
					<?php echo aq_field_input('btn2text', $block_id, $btn2text, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('btn1link') ?>">
					First Button Link
					<?php echo aq_field_input('btn1link', $block_id, $btn1link, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('btn2link') ?>">
					Second Button Link
					<?php echo aq_field_input('btn2link', $block_id, $btn2link, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('btn1target') ?>">
					First Button Target
					<?php echo aq_field_input('btn1target', $block_id, $btn1target, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('btn2target') ?>">
					Second Button Target
					<?php echo aq_field_input('btn2target', $block_id, $btn2target, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('btn1icon') ?>">
					First Button Icon
					<?php echo aq_field_input('btn1icon', $block_id, $btn1icon, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('btn2icon') ?>">
					Second Button Icon
					<?php echo aq_field_input('btn2icon', $block_id, $btn2icon, $size = 'full') ?>
				</label>
			</p>
			
			
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '
				<div class="text-center">
					<h3 class="bigtext">
						'. do_shortcode(htmlspecialchars_decode($introheading)) .'
					</h3>
					<p>
						 '. do_shortcode(htmlspecialchars_decode($introdescription)) .'
					</p>
				';	
			if (!empty($btn1text)) { echo '
			<div class="wrapbtncta"><a href="'.$btn1link.'"><i class="fa fa-'.$btn1icon.'"></i><button class="thebtn">'.$btn1text.'</button></a></div>';}
			if (!empty($btn2text)) { echo '
			<div class="wrapbtnctablack"><a href="'.$btn2link.'"><button class="thebtn">'.$btn2text.'</button><i class="fa fa-'.$btn2icon.'"></i></a></div>';}
			
		}
		
	}
}