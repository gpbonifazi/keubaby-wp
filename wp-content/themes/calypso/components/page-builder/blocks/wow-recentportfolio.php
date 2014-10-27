<?php
/** Intronote block **/

if(!class_exists('WOW_Recentportfolio')) {
	class WOW_Recentportfolio extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Recent Portfolio'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Recentportfolio', $block_options);
		}
	
	function form($instance) {
		
		$defaults = array(
			'title' => '',
			'shortcode' => '',
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
			<label for="<?php echo $this->get_field_id('description') ?>">
				Description
				<?php echo aq_field_input('description', $block_id, $description, $size = 'full') ?>
			</label>
		</div>	

		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		echo 
		'<section class="blockwowrecentportfolio parallax parallax-image light-bg" style="max-width: 1200px; margin:0px auto; overflow-x: hidden;margin-left:-2.96%; margin-right:-2.97%;">
		
			<div style="background:#f9f9f9;border-top: 1px solid #ececec;border-bottom: 1px solid #ececec;padding-top:40px;padding-bottom:40px;">
				
				<div class="container">
				
					<div class="parallax-content">
					
						<div class="row">
						
							<div class="col-md-12 text-center maintitle">
								<h2>' . do_shortcode(htmlspecialchars_decode($title)) . '</h2>
								<p class="subtitle">' . do_shortcode(htmlspecialchars_decode($description)) . '</p>
							</div>
							
							<div class="col-md-12 text-center">
							'.do_shortcode('[wow_recentportfolio]'),'
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</section>';
		
	}
	
}

}