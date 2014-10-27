<?php
/** Intronote block **/

if(!class_exists('WOW_Intronote')) {
	class WOW_Intronote extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Intro Note'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Intronote', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'introheading'     => '',
				'introdescription'  => '',
				't_animtype'  => '',
				'd_animtype'  => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$t_animtype_options = array(
							'none' => 'none',
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
						
			);

			$d_animtype_options = array(
							'none' => 'none',
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
						
			);			
			
			?>			
			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('introheading') ?>">
					Intro heading
					<?php echo aq_field_textarea('introheading', $block_id, $introheading, $size = 'full') ?>
				</label>
			</p>
			
		<p class="description">
			<label for="<?php echo $this->get_field_id('t_animtype') ?>">
				Heading Animation
				<?php echo aq_field_select('t_animtype', $block_id, $t_animtype_options, $t_animtype); ?>
			</label>
		</p>			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('introdescription') ?>">
					Intro description
					<?php echo aq_field_textarea('introdescription', $block_id, $introdescription, $size = 'full') ?>
				</label>
			</p>

		<p class="description">
			<label for="<?php echo $this->get_field_id('d_animtype') ?>">
				Description Animation
				<?php echo aq_field_select('d_animtype', $block_id, $d_animtype_options, $d_animtype); ?>
			</label>
		</p>				
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '<div class="intro-note max80 text-center"><h1 class="wow '.$t_animtype.'">'. do_shortcode(htmlspecialchars_decode($introheading)) .'</h1><p class="wow '.$d_animtype.'">'. do_shortcode(htmlspecialchars_decode($introdescription)) .'</p></div>';
			
		}
		
	}
}