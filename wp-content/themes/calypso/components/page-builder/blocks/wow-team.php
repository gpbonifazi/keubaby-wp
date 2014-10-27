<?php
/** Notifications block **/

if(!class_exists('WOW_Team')) {
	class WOW_Team extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Team'),
				'size' => 'span4',
			);
			
			//create the block
			parent::__construct('wow_team', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'title'     => '', // the name of the member
				'position'  => '', // job position
				'avatar'    => '', // profile picture
				'bio'       => '', // a little info about the member
				'twitter'   => '', // twitter URL
				'facebook'  => '', // facebook URL
				'linkedin'  => '', // linkedin URL
				'skype'  => '', // skype URL
				'e-mail'  => '', // email
				'google'    => '', // google+ URL
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
				<label for="<?php echo $this->get_field_id('title') ?>">
					Member Name<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('position') ?>">
					Position<br/>
					<?php echo aq_field_input('position', $block_id, $position) ?>
				</label>
			</p>
			
			<div class="description">
				<label for="<?php echo $this->get_field_id('avatar') ?>">
					Upload an image<br/>
					<?php echo aq_field_upload('avatar', $block_id, $avatar) ?>
				</label>
				<?php if($avatar) { ?>
				<div class="screenshot">
					<img src="<?php echo $avatar ?>" />
				</div>
				<?php } ?>
			</div>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('bio') ?>">
					Member info (bio description)
					<?php echo aq_field_textarea('bio', $block_id, $bio, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('twitter') ?>">
					Twitter<br/>
					<?php echo aq_field_input('twitter', $block_id, $twitter) ?>
				</label>
			</p>

			<p class="description half last">
				<label for="<?php echo $this->get_field_id('facebook') ?>">
					Facebook<br/>
					<?php echo aq_field_input('facebook', $block_id, $facebook) ?>
				</label>
			</p>

			<p class="description half">
				<label for="<?php echo $this->get_field_id('linkedin') ?>">
					Linkedin<br/>
					<?php echo aq_field_input('linkedin', $block_id, $linkedin) ?>
				</label>
			</p>

			<p class="description half last">
				<label for="<?php echo $this->get_field_id('google') ?>">
					Google<br/>
					<?php echo aq_field_input('google', $block_id, $google) ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('email') ?>">
					E-mail<br/>
					<?php echo aq_field_input('email', $block_id, $email) ?>
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
			<div class="thumbnail wow '.$animtype.'" data-wow-delay="'.$animdelay.'s" data-wow-duration="'.$animduration.'s">
			<img src="'. $avatar .'" alt="'. $title. '">
				<div class="caption">
					<h4>'. $title. '</h4>
					<span class="fontitalic">'. $position. '</span>
					<p>
						'. $bio. '.<br>
					</p>';				
					
					?>
					
					<ul class="social-icons">
					
						<?php 
						
						if ( ! empty ( $facebook ) ) { 
						echo '<li><a href="'. $facebook . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
					   }
					   
						if ( ! empty ( $twitter ) ) {
						echo '<li><a href="'. $twitter . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
					    }
					   
					   if ( ! empty ( $linkedin ) ) {
						echo '<li><a href="'. $linkedin . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
					   }
					   
					   if ( ! empty ( $google ) ) {
						echo '<li><a href="'. $google . '" target="_blank"><i class="fa fa-google"></i></a></li>';
						}
					   
					   if ( ! empty ( $email ) ) {
						echo '<li><a href="'. $email . '" target="_blank"><i class="fa fa-envelope"></i></a></li>';
						} 
						
						?>
									
					</ul>
					
					<?php
				echo '</div>
			</div>';
			
		}
		
	}
}