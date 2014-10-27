<?php
/**
 * Displaying page header bg/slider if set
 */
global $page;
global $post;
wp_enqueue_script( 'wowflexslider' );
$prefix = '_mwow_';
$entries = get_post_meta( get_the_ID(), $prefix . 'repeat_group', true );
?>
<div id="post-<?php the_ID(); ?>">
	<div class="customtypewowslider fullwidth flexslider">
		
		<ul class="slides">

		<?php

		foreach ( (array) $entries as $key => $entry ) {

		$img = $title = $titlecolor = $titleanim = $desc = $desccolor = $descanim = $free = $sliderheight = $caption = '';
		
		$sliderheight = isset( $entry['sliderheight'] ) ? esc_html( $entry['sliderheight'] ) : '';	

		if ( isset( $entry['title'] ) )
			$title = esc_html( $entry['title'] );
			
		if ( isset( $entry['titlecolor'] ) )
				$titlecolor = do_shortcode( $entry['titlecolor'] );
			
		 if ( isset( $entry['titleanim'] ) )
			$titleanim = esc_html( $entry['titleanim'] );

		if ( isset( $entry['description'] ) )
			$desc = do_shortcode( $entry['description'] );
			
		if ( isset( $entry['desccolor'] ) )
				$desccolor = do_shortcode( $entry['desccolor'] );
			
		if ( isset( $entry['descriptionanim'] ) )
			$descanim = esc_html( $entry['descriptionanim'] );
			
		if ( isset( $entry['freearea'] ) )
			$free = do_shortcode( $entry['freearea'] );

		if ( isset( $entry['image_id'] ) ) {            
			$img = wp_get_attachment_image( $entry['image_id'], 'share-pick', null, array(
				'class' => 'thumb',
			) );
		}

		$caption = isset( $entry['image_caption_margin'] ) ? esc_html( $entry['image_caption_margin'] ) : '';
		?>
			<li style="height:<?php echo $sliderheight;?>;">
				<?php echo $img;?>
				<div class="row">
					
						<div class="flex-caption" style="top:<?php echo $caption;?>;">
							<h3 class="slidertitle wow <?php echo $titleanim;?> slow"><span style="color:<?php echo $titlecolor;?>;"><?php echo $title;?></span></h3>
							<h4 class="sliderdescription wow <?php echo $descanim;?> slower"><span style="color:<?php echo $desccolor;?>;"><?php echo $desc;?></span></h4>
							<span class="freearea" style="color:<?php echo $desccolor;?>;"><?php echo $free;?></span>
						</div>
					
				</div>
			</li>	

		<?php	
		}
		?>
		</ul>	
	</div>
</div>
<div class="clearfix"></div>