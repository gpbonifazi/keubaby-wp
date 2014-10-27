<?php

if(!class_exists('WOWT_Timeline')) {
	class WOWT_Timeline extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'W Timeline',
				'size' => 'span12',
			);
			
			//create the widget
			parent::__construct('WOWT_Timeline', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_wowtimeline_add_new', array($this, 'add_wowtimeline'));
			
		}
		
		function form($instance) {
		
			$defaults = array(
				'wowtimelines' => array(
					1 => array(
						'title' => 'Title',
						'content' => 'Content',
						'icon' => 'bolt',
						'date' => '4/10/14',
					)
				)
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			
			?>
			<div class="description cf">
				<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
					<?php
					$wowtimelines = is_array($wowtimelines) ? $wowtimelines : $defaults['wowtimelines'];
					$count = 1;
					foreach($wowtimelines as $wowtimeline) {	
						$this->wowtimeline($wowtimeline, $count);
						$count++;
					}
					?>
				</ul>
				<p></p>
				<a href="#" rel="wowtimeline" class="aq-sortable-add-new button">Add New</a>
				<p></p>
			</div>

			<?php
		}
		
		function wowtimeline($wowtimeline = array(), $count = 0) {
				
			?>
			<li id="<?php echo $this->get_field_id('wowtimelines') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
				
				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong>Timeline #<?php echo $wowtimeline['date'] ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
				
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-date">
							Date<br/>
							<input type="text" id="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-date" class="input-full" name="<?php echo $this->get_field_name('wowtimelines') ?>[<?php echo $count ?>][date]" value="<?php echo $wowtimeline['date'] ?>" />
						</label>
					</p>
					
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-title">
							Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('wowtimelines') ?>[<?php echo $count ?>][title]" value="<?php echo $wowtimeline['title'] ?>" />
						</label>
					</p>
					
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-icon">
							Icon<br/>
							<input type="text" id="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-icon" class="input-full" name="<?php echo $this->get_field_name('wowtimelines') ?>[<?php echo $count ?>][icon]" value="<?php echo $wowtimeline['icon'] ?>" />
						</label>
					</p>
					
					<p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-content">
							Description<br/>
							<textarea id="<?php echo $this->get_field_id('wowtimelines') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('wowtimelines') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $wowtimeline['content'] ?></textarea>
						</label>
					</p>
					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				</div>
				
			</li>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			
			
			$output = '';
				
				$output  .= '<ul class="cbp_tmtimeline">';
				
				foreach( $wowtimelines as $wowtimeline ){

					$output .= '<li>
					<time class="cbp_tmtime"><span>'. $wowtimeline['date'] .'</span></time>
					<div class="cbp_tmicon">
						<i class="fa fa-'. $wowtimeline['icon'] .'"></i>
					</div>
					<div class="cbp_tmlabel">
						<h2>'. $wowtimeline['title'] .'</h2>
						<p>
							'.do_shortcode(htmlspecialchars_decode($wowtimeline['content'])).'						
						</p>
					</div>
					</li>';

				}
				$output .= '</ul>';
				
				
			
			echo $output;
			
		}
		
		/* AJAX add wowtimeline */
		function add_wowtimeline() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the wowtimeline
			$wowtimeline = array(
						'title' => '',
						'content' => '',
						'icon' => '',
						'date' => '',
			);
			
			if($count) {
				$this->wowtimeline($wowtimeline, $count);
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