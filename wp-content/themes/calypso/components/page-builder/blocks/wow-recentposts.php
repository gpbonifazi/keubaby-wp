<?php
/** Intronote block **/

if(!class_exists('WOW_Recentposts')) {
	class WOW_Recentposts extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Recent Posts'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Recentposts', $block_options);
		}
	
	function form($instance) {
		
		$defaults = array(
			'title' => 'Enter Blog',
			'shortcode' => '',
			'bloglink' => '',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<div class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</div>
		
		<div class="description">
			<label for="<?php echo $this->get_field_id('bloglink') ?>">
				Blog Link
				<?php echo aq_field_input('bloglink', $block_id, $bloglink, $size = 'full') ?>
			</label>
		</div>	

		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		echo 
		'<section class="recentpostsblock parallax parallax-image light-bg" style="max-width: 1200px; margin:0px auto; overflow-x: hidden;margin-left:-2.96%; margin-right:-2.97%;">
		
			<div style="background:#f9f9f9;border-top: 1px solid #ececec;border-bottom: 1px solid #ececec; padding-top:40px;padding-bottom:40px;">
				
				<div class="container">
				
					<div class="parallax-content wparfeaturedwork recentff">
					
						<div class="row">													
							<div class="col-md-12 text-center">
							'.do_shortcode('[wow_recent-posts bloglink="'.$bloglink.'" invite="'.$title.'" icon="fa-arrow-right"]'),'
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</section>';
		
	}
	
}

}