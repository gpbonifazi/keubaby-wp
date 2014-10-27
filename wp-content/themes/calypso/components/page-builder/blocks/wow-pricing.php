<?php
/** Intronote block **/

if(!class_exists('WOWT_Pricing')) {
	class WOWT_Pricing extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Pricing'),
				'size' => 'span4',
			);
			
			//create the block
			parent::__construct('WOWT_Pricing', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'featured'     	=> '',
				'title'  		=> '',
				'price'  		=> '',
				'per'  	=> '',
				'buttonurl'  		=> '',
				'buttontext'  	=> '',
				'buttontarget'  => '',
				'animtype'  	=> '',
				'animduration'  => '',
				'animdelay'  	=> '',
				'features'  	=> '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$featured_options = array(
						'yes' => 'yes',						
						'no' => 'no',
			);
			
			$buttontarget_options = array(
						'self' => 'self',						
						'blank' => 'blank',
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
			
				
			<p class="description half">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title
					<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('price') ?>">
					Price
					<?php echo aq_field_input('price', $block_id, $price, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('per') ?>">
					Per
					<?php echo aq_field_input('per', $block_id, $per, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('featured') ?>">
					Highlight?<br/>
					<?php echo aq_field_select('featured', $block_id, $featured_options, $featured); ?>
				</label>
			</p>
			
			<p class="description one third">
				<label for="<?php echo $this->get_field_id('buttonurl') ?>">
					Button URL
					<?php echo aq_field_input('buttonurl', $block_id, $buttonurl, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description one third">
				<label for="<?php echo $this->get_field_id('buttontext') ?>">
					Button Text
					<?php echo aq_field_input('buttontext', $block_id, $buttontext, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description one third last">
				<label for="<?php echo $this->get_field_id('buttontarget') ?>">
					Button Target
					<?php echo aq_field_select('buttontarget', $block_id, $buttontarget_options, $buttontarget); ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('features') ?>">
					Features (ex: &lt;li&gt;feature 1&lt;/li&gt; &lt;li&gt;feature 2&lt;/li&gt; etc)
					<?php echo aq_field_textarea('features', $block_id, $features, $size = 'full') ?>
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
			
			echo do_shortcode('
			<div class="wow '.$animtype.'" data-wow-delay="'.$animdelay.'s" data-wow-duration="'.$animduration.'s">
			[wow_pricing_table]
			[wow_pricing plan="'.$title.'" featured="'.$featured.'" cost="'.$price.'" per="'.$per.'" button_url="'.$buttonurl.'" button_text="'.$buttontext.'" button_target="'.$buttontarget.'"]
			<ul>
			'. do_shortcode(htmlspecialchars_decode($features)) .'			
			</ul>
			[/wow_pricing]
			[/wow_pricing_table]
			</div>')
			;
			
		}
		
	}
}