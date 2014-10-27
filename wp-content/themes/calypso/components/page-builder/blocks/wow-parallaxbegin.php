<?php
/** Parallax block **/

if(!class_exists('WOW_Parallaxbegin')) {
	class WOW_Parallaxbegin extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Parallax Begin'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Parallaxbegin', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'parallaxbgimg'     => '',
				'parallaxptn'     => '',
				'parallaxclr'     => '',
				'opacity'     => '',
				'textstyle' => '',
				'textcolor' => '',
				'paddingtop' => '',
				'paddingbottom' => '',
				'margintop' => '',
				'marginbottom' => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			$textstyle_options = array(
						'light-bg' => 'Dark Text',
						'dark-bg' => 'Light Text',					
						
			);
						
							
						
			
			?>	

			<p class="description">
				<label for="<?php echo $this->get_field_id('parallaxbgimg') ?>">
					Parallax Background Image<br/>
					<?php echo aq_field_upload('parallaxbgimg', $block_id, $parallaxbgimg) ?>
				</label>
				<?php if($parallaxbgimg) { ?>
				<div class="screenshot">
					<img src="<?php echo $parallaxbgimg ?>" />
				</div>
				<?php } ?>
			</p>			

			
			<p class="description">
				<label for="<?php echo $this->get_field_id('parallaxclr') ?>">
					Parallax Background Color<br/>
					<div class="aqpb-color-picker">						
					<?php echo aq_field_color_picker('parallaxclr', $block_id, $parallaxclr, $default = '#f54828') ?>					
					</div>           
				</label>
			</p>			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('parallaxptn') ?>">
					Parallax Pattern<br/>
					<?php echo aq_field_upload('parallaxptn', $block_id, $parallaxptn) ?>
				</label>
				<?php if($parallaxptn) { ?>
				<div class="screenshot">
					<img src="<?php echo $parallaxptn ?>" />
				</div>
				<?php } ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('opacity') ?>">
					Opacity (from 0 to 1, ex: 0.5)
					<?php echo aq_field_input('opacity', $block_id, $opacity, $size = 'small') ?>
				</label>
			</p>
			
			<p class="description">
			<label for="<?php echo $this->get_field_id('textstyle') ?>">
				Text Color<br/>
				<?php echo aq_field_select('textstyle', $block_id, $textstyle_options, $textstyle); ?>
			</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('textcolor') ?>">
					Text Color<br/>
					<div class="aqpb-color-picker">						
					<?php echo aq_field_color_picker('textcolor', $block_id, $textcolor, $default = '') ?>					
					</div>           
				</label>
			</p>
		
			<p class="description half">
				<label for="<?php echo $this->get_field_id('paddingtop') ?>">
					Padding Top  (example: 80px)<br/>
					<?php echo aq_field_input('paddingtop', $block_id, $paddingtop, $size = 'small') ?>
				</label>
			</p>
			
			<p class="description half-last">
				<label for="<?php echo $this->get_field_id('margintop') ?>">
					Margin Top  (example: -20px or 20px)
					<?php echo aq_field_input('margintop', $block_id, $margintop, $size = 'small') ?>
				</label>
			</p>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('paddingbottom') ?>">
					Padding Bottom (example: 80px)<br/>
					<?php echo aq_field_input('paddingbottom', $block_id, $paddingbottom, $size = 'small') ?>
				</label>
			</p>

			
			<p class="description half-last">
				<label for="<?php echo $this->get_field_id('marginbottom') ?>">
					Margin Bottom (example: -20px or 20px)
					<?php echo aq_field_input('marginbottom', $block_id, $marginbottom, $size = 'small') ?>
				</label>
			</p>
			
			
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '
	'.wp_enqueue_script( 'wowparallax' ).'

	<section class="parallax parallax-image '.$textstyle.'" style="max-width: 1200px; margin:0px auto; overflow-x: hidden;margin-left:-2.96%; margin-right:-2.97%;background-image:url('.$parallaxbgimg.'); margin-top:'.$margintop.';margin-bottom:'.$marginbottom.'; color:'.$textcolor.';">
		
		<div class="wrapsection" style="background-image:url('.$parallaxptn.'); background-repeat:repeat;">
		
			<div class="overlay" style="background-color: '.$parallaxclr.'; opacity: '.$opacity.';"></div>
			<div class="page-wrapper" style="padding-top:'.$paddingtop.';padding-bottom:'.$paddingbottom.';">
			<div class="container">
			
				<div class="parallax-content">
					<div class="row">

			';	
			
		}
		
	}
}