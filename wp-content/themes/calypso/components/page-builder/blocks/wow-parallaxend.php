<?php
/** Parallax block **/

if(!class_exists('WOW_Parallaxend')) {
	class WOW_Parallaxend extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Parallax End'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOW_Parallaxend', $block_options);
		}
		
		function form($instance) {
			
			// default key/values array
			$defaults = array(

			);
						
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>		
			
			
			
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			echo '</div>
				
			</div>
			
		</div>
		
		</div>
		</div>
		
	</section>

';	
			
		}
		
	}
}