<?php
/* List Block */
if(!class_exists('WOW_Testimon')) {
	class WOW_Testimon extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'W Testimonial',
				'size' => 'span12',
			);
			
			//create the widget
			parent::__construct('WOW_Testimon', $block_options);
			
		}
		
		function form($instance) {
					$defaults = array(
						'content' => '',
						'position' => '',						
						'photo' => '',
										'animtype'  	=> '',
				'animduration'  => '',
				'animdelay'  	=> '',
			);		
		
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
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
				<label for="<?php echo $this->get_field_id('content') ?>">
					Testimonial Content
					<?php echo aq_field_textarea('content', $block_id, $content, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('position') ?>">
					Name and Position
					<?php echo aq_field_input('position', $block_id, $position, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('photo') ?>">
					Avatar/Photo<br/>
					<?php echo aq_field_upload('photo', $block_id, $photo) ?>
				</label>
				<?php if($photo) { ?>
				<div class="screenshot">
					<img src="<?php echo $photo ?>" />
				</div>
				<?php } ?>
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
			echo '<blockquote class="ttm wow '.$animtype.'" data-wow-delay="'.$animdelay.'s" data-wow-duration="'.$animduration.'s"><i class="fa fa-quote-left colortext quoteicon"></i> '. do_shortcode(htmlspecialchars_decode($content)) .' <footer> '.$position.' &nbsp;<img src="'.$photo.'" alt="'.$position.'"></footer></blockquote>';			
		}

	}
}