<?php
/** Intronote block **/

if(!class_exists('WOW_Services2')) {
	class WOW_Services2 extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Services2'),
				'size' => 'span4',
			);
			
			//create the block
			parent::__construct('WOW_Services2', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'style'     	=> '',
				'title'  		=> '',
				'icon'  		=> '',
				'description'  	=> '',
				'link'  		=> '',
				'animtype'  	=> '',
				'animduration'  => '',
				'animdelay'  	=> '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$service2_style = array(
						'2' => '2',						
						'3' => '3',
						'4' => '4',
						'5' => '5',
			);
			
			$animtype_options = array(
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
			
				$animduration_options = array(
							'0.1' => '0.1',
							'0.4'   => '0.4',
							'0.6'     => '0.6',
							'0.8'     => '0.8',
							'1.0' => '1.0',
							'1.2'   => '1.2',
							'1.4'     => '1.4',
							'1.6'     => '1.6',
							'1.8' => '1.8',
							'2.0'   => '2.0',
							'2.2'     => '2.2',
							'2.4'     => '2.4',
							'2.6' => '2.6',
							'2.8'   => '2.8',
							'3.0'     => '3.0',
							'3.4'     => '3.4',
							'3.8' => '3.8',
							'4.0'   => '4.0',
							'4.4'     => '4.4',
							'4.8'     => '4.8',
							'5.2' => '5.2',
							'5.6'   => '5.6',
							'6.0'     => '6.0',
							'6.4'     => '6.4',
							'6.8' => '6.8',
							'7.2'   => '7.2',
							'7.6'     => '7.6',
							'8.0'     => '8.0',
							'8.4' => '8.4',
							'8.8'   => '8.8',
							'9.2'     => '9.2',
							'9.6'     => '9.6',								
						
			);
			
				$animdelay_options = array(
							'0.1' => '0.1',
							'0.2' => '0.2',
							'0.3' => '0.3',
							'0.4'   => '0.4',
							'0.5' => '0.5',
							'0.6'     => '0.6',
							'0.7' => '0.7',
							'0.8'     => '0.8',
							'0.9' => '0.9',
							'1.0' => '1.0',
							'1.2'   => '1.2',
							'1.4'     => '1.4',
							'1.6'     => '1.6',
							'1.8' => '1.8',
							'2.0'   => '2.0',
							'2.2'     => '2.2',
							'2.4'     => '2.4',
							'2.6' => '2.6',
							'2.8'   => '2.8',
							'3.0'     => '3.0',
							'3.4'     => '3.4',
							'3.8' => '3.8',
							'4.0'   => '4.0',
							'4.4'     => '4.4',
							'4.8'     => '4.8',
							'5.2' => '5.2',
							'5.6'   => '5.6',
							'6.0'     => '6.0',
							'6.4'     => '6.4',
							'6.8' => '6.8',
							'7.2'   => '7.2',
							'7.6'     => '7.6',
							'8.0'     => '8.0',
							'8.4' => '8.4',
							'8.8'   => '8.8',
							'9.2'     => '9.2',
							'9.6'     => '9.6',								
						
			);			
			
			?>			
			
				
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title
					<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('description') ?>">
					Description
					<?php echo aq_field_textarea('description', $block_id, $description, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('icon') ?>">
					Icon
					<?php echo aq_field_input('icon', $block_id, $icon, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('style') ?>">
					Button Icon<br/>
					<?php echo aq_field_select('style', $block_id, $service2_style, $style); ?>
				</label>
			</p>
			
		<p class="description">
			<label for="<?php echo $this->get_field_id('animtype') ?>">
				Animation
				<?php echo aq_field_select('animtype', $block_id, $animtype_options, $animtype); ?>
			</label>
		</p>
			
		<p class="description">
			<label for="<?php echo $this->get_field_id('animduration') ?>">
				Anim Duration
				<?php echo aq_field_select('animduration', $block_id, $animduration_options, $animduration); ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('animdelay') ?>">
				Anim Delay
				<?php echo aq_field_select('animdelay', $block_id, $animdelay_options, $animdelay); ?>
			</label>
		</p>
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '
			<div class="servicestyle'.$style.' wow '.$animtype.'" data-wow-delay="'.$animdelay.'s" data-wow-duration="'.$animduration.'s">
				<h4>'. do_shortcode(htmlspecialchars_decode($title)) .'</h4>
				<p>	'. do_shortcode(htmlspecialchars_decode($description)) .'</p>
				<i class="fa fa-'.$icon.'"></i>
			</div>
			
			';
			
		}
		
	}
}