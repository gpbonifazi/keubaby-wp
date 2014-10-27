<?php
/**
 * Displaying parallax area if set
 */	global $page;
	global $post;
	
	wp_enqueue_script( 'wowparallax' );
	
	$pparallaxheaderimg = get_post_meta( $post->ID, '_mwow_parallaxheaderimg', true );
	$pparallaxheaderheight = get_post_meta( $post->ID, '_mwow_parallaxheaderheight', true );
	$pparallaxheaderbgcolor = get_post_meta( $post->ID, '_mwow_parallaxheaderbgcolor', true );
	$pparallaxheaderopacity = get_post_meta( $post->ID, '_mwow_parallaxheaderopacity', true );
	$pparallaxheaderpattern = get_post_meta( $post->ID, '_mwow_parallaxheaderpattern', true );	
	$pparallaxheadertextcolor = get_post_meta( $post->ID, '_mwow_parallaxheadertextcolor', true );
	$pparallaxtext = get_post_meta( $post->ID, '_mwow_parallaxtext', true );
	$pparallaxpadtop = get_post_meta( $post->ID, '_mwow_parallaxpadtop', true );	
	$pparallaxpadbot = get_post_meta( $post->ID, '_mwow_parallaxpadbot', true );	
?>

<section id="post-<?php the_ID(); ?>" class="parallax parallax-image" style="background-color: <?php echo $pparallaxheaderbgcolor; ?>; background-image:url(<?php if (is_array($pparallaxheaderimg)) { foreach ($pparallaxheaderimg as $attachment_id => $img_full_url) {echo $img_full_url;} }?>);">
	<div class="wrapsection partparallaxarea" style="background-image:url(<?php  if (is_array($pparallaxheaderpattern)) { foreach ($pparallaxheaderpattern as $attachment_id => $pattern_img_full_url) {echo $pattern_img_full_url;} }?>); background-repeat:repeat;">	
		<div class="overlay" style="background-color: <?php echo $pparallaxheaderbgcolor; ?>; opacity: <?php echo $pparallaxheaderopacity; ?>;"></div>
		<div class="container">
			<div  class="parallax-content" style="padding-top:<?php echo $pparallaxpadtop; ?>;padding-bottom:<?php echo $pparallaxpadbot; ?>;color:<?php echo $pparallaxheadertextcolor;?>;">		
				<div class="row">
					<?php echo do_shortcode($pparallaxtext); ?>
				</div>
			</div> <!-- .parallax-content -->
		</div>	
	</div>
</section> <!-- .end parallaxphp -->