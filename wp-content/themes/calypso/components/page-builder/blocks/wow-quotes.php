<?php
/* List Block */
if(!class_exists('WOW_Quotes')) {
	class WOW_Quotes extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'W Quote Rotator',
				'size' => 'span12',
			);
			
			//create the widget
			parent::__construct('WOW_Quotes', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_test_add_new', array($this, 'add_test_item'));
			
		}
		
		function form($instance) {
		
			$defaults = array(				
				'items' => array(
					1 => array(
						'title' => 'New Text',
						'content' => '',
						'position' => '',						
						'photo' => '',
					)
				),

			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>

	
			<div class="cf"></div>

			<div class="description cf">
				<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
					<?php
					$items = is_array($items) ? $items : $defaults['items'];
					$count = 1;
					foreach($items as $item) {	
						$this->item($item, $count);
						$count++;
					}
					?>
				</ul>
				<p></p>
				<a href="#" rel="test" class="aq-sortable-add-new button">Add New</a>
				<p></p>
			</div>

			<?php
		}
		
		function item($item = array(), $count = 0) {

			?>
			<li id="sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
				
				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong><?php echo $item['title'] ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
					<div class="tab-desc description">
						<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title">
							Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][title]" value="<?php echo $item['title'] ?>" />
						</label>
					</div>

					<div class="tab-desc description">
						<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-position">
							Name and Position<br/>
							<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-position" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][position]" value="<?php echo $item['position'] ?>" />
						</label>
					</div>

					<div class="tab-desc description">
						<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-photo">
							Photo <em style="font-size: 0.8em;">(Recommended size: 50 x 50 pixel)</em><br/>
							<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-photo" class="input-full input-upload" value="<?php echo $item['photo'] ?>" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][photo]">
							<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
						</label>
					</div>

					<div class="tab-desc description">
						<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">
							Text<br/>
							<textarea id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $item['content'] ?></textarea>
						</label>
					</div>

					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>
				
			</li>
			<?php
		}
		

		


		function block($instance) {
			extract($instance);
			
			wp_enqueue_script('wowtestimrotator');
			
			$output = '';
			

			$output .= '<div id="cbp-qtrotator" class="cbp-qtrotator">';

			


				if (!empty($items)) {

					$i = 1;

					foreach( $items as $item ) {					
					
					
						$output .= '<div class="cbp-qtcontent">';
						
						$output .= (!empty($item['title']) ? '<h2 class="text-center">'.do_shortcode(htmlspecialchars_decode($item['title'])).'</h2>' : '' );
						
						$output .= '<blockquote>';
						
						$output .= '<p class="bigquote"><i class="fa fa-quote-left colortext quoteicon"></i>';
						$output .= do_shortcode(htmlspecialchars_decode($item['content']));
						$output .= '</p>';
						
						$output .= '<footer><img src="'.($item['photo']).'" alt=""> '. do_shortcode(htmlspecialchars_decode($item['position'])) .'</footer>';
						
						$output .= '</blockquote>';
						$output .= '</div>';

						$i++;
					}
				}
			

		
			$output .= '</div>';

				
			echo $output;
			
		}




		
		
		
		/* AJAX add testimonial */
		function add_test_item() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the testimonial
			$item = array(
				'title' => 'New Testimonial',
				'content' => '',
				'position' => '',
				'photo' => '',
			);
			
			if($count) {
				$this->item($item, $count);
			} else {
				die(-1);
			}
			
			die();
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
	}
}