<?php

if(!class_exists('WOWT_Imagecarousel')) {
	class WOWT_Imagecarousel extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => __('W Image Carousel'),
				'size' => 'span12',
			);
			
			//create the block
			parent::__construct('WOWT_Imagecarousel', $block_options);
			
			//add ajax functions
			add_action('wp_ajax_aq_block_wowimgcar_add_new', array($this, 'add_wowimgcar'));
		}
		
		function form($instance) {
		
			$defaults = array(
				'wowimgcars' => array(
					1 => array(
						'carouselimg' => '',
						'carousellink' => '',
					)
				)
			);

		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		
		<div class="description">
			<label for="<?php echo $this->get_field_id('carouseltitle') ?>">
				Title
				<?php echo aq_field_input('carouseltitle', $block_id, $carouseltitle, $size = 'full') ?>
			</label>
		</div>
		
		<div class="description">
			<label for="<?php echo $this->get_field_id('carouseldescription') ?>">
				Description
				<?php echo aq_field_input('carouseldescription', $block_id, $carouseldescription, $size = 'full') ?>
			</label>
		</div>	
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$wowimgcars = is_array($wowimgcars) ? $wowimgcars : $defaults['wowimgcars'];
				$count = 1;
				foreach($wowimgcars as $wowimgcar) {	
					$this->wowimgcar($wowimgcar, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="wowimgcar" class="aq-sortable-add-new button">Add New Image</a>
			<p></p>
		</div>
		
		<?php
	}
	
	
	
	
	
	function wowimgcar($wowimgcar = array(), $count = 0) {
	
			?>
			
			<li id="<?php echo $this->get_field_id('wowimgcars') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">

				<div class="sortable-head cf">
					<div class="sortable-title">
						<strong>Image Carousel #<?php echo $count; ?></strong>
					</div>
					<div class="sortable-handle">
						<a href="#">Open / Close</a>
					</div>
				</div>			
			
				<div class="sortable-body">
				
					 <p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('wowimgcars') ?>-<?php echo $count ?>-carouselimg">
							Image Carousel<br/>
							  <input type="text" class="input-full input-upload" id="<?php echo $this->get_field_id('wowimgcars') ?>-<?php echo $count ?>-carouselimg" class="input-full"  name="<?php echo $this->get_field_name('wowimgcars') ?>[<?php echo $count ?>][carouselimg]" value="<?php echo $wowimgcar['carouselimg'] ?>" />
                          
							<a href="#" class="aq_upload_button button" rel="image">Upload</a>
						</label>
					</p>
					
					 <p class="tab-desc description">
						<label for="<?php echo $this->get_field_id('wowimgcars') ?>-<?php echo $count ?>-carousellink">
							Target Link (optional)<br/>
							<input type="text" id="<?php echo $this->get_field_id('wowimgcars') ?>-<?php echo $count ?>-carousellink" class="input-full" name="<?php echo $this->get_field_name('wowimgcars') ?>[<?php echo $count ?>][carousellink]" value="<?php echo $wowimgcar['carousellink'] ?>" />
						</label>
					</p>
					
					<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
				
				</div>
				
				
	
				</li>
			<?php
		}
	
	
	
	
	
	
	
	
	function block($instance) {
		extract($instance);
		
		echo wp_enqueue_script( 'wowrecentfolio' );		
		
		
		$output = '';
		
		$output  .= '<section class="imagecarouselblock parallax parallax-image light-bg" style="max-width: 1200px; margin:0px auto; overflow-x: hidden;margin-left:-2.96%; margin-right:-2.97%;">
		
						<div style="background:#f9f9f9;border-top: 1px solid #ececec;border-bottom: 1px solid #ececec;padding-top:40px;padding-bottom:40px;">
							
							<div class="container">
							
								<div class="parallax-content">
								
									<div class="row">
										
										<div class="col-md-12 text-center maintitle">
											<h2>' . do_shortcode(htmlspecialchars_decode($carouseltitle)) . '</h2>
											<p class="subtitle">' . do_shortcode(htmlspecialchars_decode($carouseldescription)) . '</p>
										</div>
									
										<div class="col-md-12">
										<div class="text-center smalltitle"></div>
											<div class="list_carousel text-center">
										
												<div class="carousel_nav">
													<a class="prev" id="car_prev" href="#"><span>prev</span></a>
													<a class="next" id="car_next" href="#"><span>next</span></a>
												</div>
												<div class="clearfix"></div>
												
													<ul class="carufred">';
													
		
		if (is_array($wowimgcars)) {
		
		foreach( $wowimgcars as $wowimgcar ){
		
		$carouselimg = $wowimgcar['carouselimg'];
		$carousellink = $wowimgcar['carousellink'];
		
		$output  .= '<li>
						<div class="wowimgcars-projects">
							<div class="wowimgcars-projects-image">';
							
							if (empty($carousellink)) {
								$output  .= '<img src="'.$carouselimg.'">';								
								} else {
								$output  .= '<a href="'.$carousellink.'" target="_blank"><img src="'.$carouselimg.'"></a>';
								} 
			$output  .= '</div>
						</div>
					</li>';
			}
		
		}
		
		
		
		
		$output .= '</ul><div class="clearfix"></div></div></div></div></div></div></div></section>';
		
		echo $output;
	
		}
		
		
		
		
		/* AJAX add */
		function add_wowimgcar() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the 
			$wowimgcar = array(
						'carouselimg' => '',
						'carousellink' => '',
			);
			
			if($count) {
				$this->wowimgcar($wowimgcar, $count);
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