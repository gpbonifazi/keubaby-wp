<?php

if(!class_exists('WOWT_Accordion')) {
	class WOWT_Accordion extends AQ_Block {
	
		function __construct() {
			$block_options = array(
				'name' => 'W Accordions',
				'size' => 'span6',
			);
			
			//create the widget
			parent::__construct('WOWT_Accordion', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_wowacc_add_new', array($this, 'add_wowacc'));
			
		}
		
		function form($instance) {
		
			$defaults = array(
				'wowaccs' => array(
					1 => array(
						'title' => 'My New Accordion',
						'content' => 'Accordion Content',
						'activetab' => 'yes',
					)
				)
			);
			
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			
			?>
			<div class="description cf">
				<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
					<?php
					$wowaccs = is_array($wowaccs) ? $wowaccs : $defaults['wowaccs'];
					$count = 1;
					foreach($wowaccs as $wowacc) {	
						$this->wowacc($wowacc, $count);
						$count++;
					}
					?>
				</ul>
				<p></p>
				<a href="#" rel="wowacc" class="aq-sortable-add-new button">Add New</a>
				<p></p>
			</div>

			<?php
		}
		
		function wowacc($wowacc = array(), $count = 0) {
				
			?>
			<li id="<?php echo $this->get_field_id('wowaccs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
				
				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong>Accordion #<?php echo $count; ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>
				
				<div class="sortable-body">
				
					<p class="tab-activetab description">
						<label for="<?php echo $this->get_field_id('wowaccs') ?>-<?php echo $count ?>-activetab">
						  Accordion item opened?<br/>
							<select id="<?php echo $this->get_field_id('wowaccs') ?>-<?php echo $count ?>-activetab" name="<?php echo $this->get_field_name('wowaccs') ?>[<?php echo $count ?>][activetab]">
								<option value="no">No</option>
								<option value="yes">Yes</option>
								<option value="<?php echo $wowacc['activetab'] ?>" selected="selected"><?php echo  $wowacc['activetab'] ?> &#10003 </option>
							</select>						
						</label>
					</p>
					
					<p class="tab-title description">
						<label for="<?php echo $this->get_field_id('wowaccs') ?>-<?php echo $count ?>-title">
							Title<br/>
							<input type="text" id="<?php echo $this->get_field_id('wowaccs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('wowaccs') ?>[<?php echo $count ?>][title]" value="<?php echo $wowacc['title'] ?>" />
						</label>
					</p>
					
					<p class="tab-content description">
						<label for="<?php echo $this->get_field_id('wowaccs') ?>-<?php echo $count ?>-content">
							Content<br/>
							<textarea id="<?php echo $this->get_field_id('wowaccs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('wowaccs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $wowacc['content'] ?></textarea>
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
				
				$output  .= '<div id="waccordion" class="waccordio">';
				foreach( $wowaccs as $wowacc ){
				
					$activetab = $wowacc['activetab'];		
				
					if($activetab == 'yes')
						$var = 'class="active" ';
					else
						$var = '';
						
						$output .= '<div '.$var.'>';
							$output .= '<h4>'. $wowacc['title'] .'</h4>';
							$output .= '<p>';
								$output .= do_shortcode(htmlspecialchars_decode($wowacc['content']));								
							$output .= '</p>';
						$output .= '</div>';
				}
				$output .= '</div>';
				
				
			
			echo $output;
			
		}
		
		/* AJAX add wowacc */
		function add_wowacc() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the wowacc
			$wowacc = array(
				'title' => 'Another Accordion',
				'content' => 'Another Content',
				'activetab' => 'no',
			);
			
			if($count) {
				$this->wowacc($wowacc, $count);
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