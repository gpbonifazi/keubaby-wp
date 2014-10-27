<?php
/** Parallax block **/

if(!class_exists('WOW_Features')) {
	class WOW_Features extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Features'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Features', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(
				'leftimg'     => '',
				'rightcontent'     => '',
				'headtitle'     => '',
				'headdescription'     => '',
			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>		

			<p class="description">
				<label for="<?php echo $this->get_field_id('headtitle') ?>">
					Title
					<?php echo aq_field_input('headtitle', $block_id, $headtitle, $size = 'full') ?>
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('headdescription') ?>">
					Description
					<?php echo aq_field_textarea('headdescription', $block_id, $headdescription, $size = 'full') ?>
				</label>
			</p>
			
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('leftimg') ?>">
					Left Image<br/>
					<?php echo aq_field_upload('leftimg', $block_id, $leftimg) ?>
				</label>
				<?php if($leftimg) { ?>
				<div class="screenshot">
					<img src="<?php echo $leftimg ?>" />
				</div>
				<?php } ?>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('rightcontent') ?>">
					Right Content
					<?php echo aq_field_textarea('rightcontent', $block_id, $rightcontent, $size = 'full') ?>
				</label>
			</p>
			
			
			
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '<div class="row wparfeaturedwork">
					<div class="col-md-12 text-center maintitle">
							<h2>' . do_shortcode(htmlspecialchars_decode($headtitle)) . '</h2>
							<p class="subtitle">' . do_shortcode(htmlspecialchars_decode($headdescription)) . '</p>
						</div>
						
						<div class="col-md-6 wow fadeInLeft">
							<img src="'.$leftimg.'" alt="'.$headtitle.'" class="img-responsive">
						</div>
						
						<div class="col-md-6 wow fadeInRight">
							' . do_shortcode(htmlspecialchars_decode($rightcontent)) . '
						</div>
					</div>';	
			
		}
		
	}
}