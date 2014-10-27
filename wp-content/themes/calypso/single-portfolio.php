<?php
get_header();
global $post;
global $smof_data; 
global $bbwoptions;
?>	
	<!-- IF TOP SHORTCODE ADDED -->
	<?php 
	if ( get_post_meta($post->ID,"_mwow_slider_top",true)!="") {
	echo do_shortcode (get_post_meta($post->ID, "_mwow_slider_top", true)); ?>	
	<div id="pagephp page-<?php the_ID(); ?>">
		<div class="wrapsemibox">
			<div class="semiboxshadow text-center">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/shp.png" class="img-responsive" alt="">
			</div>
			<div class="container">					
				<div class="row">
				<!-- IF BLOG WITH SIDEBAR -->
					<?php if ( is_active_sidebar('sidebar-portfoliosingle') ) { ?>						
						<div id="primary" class="col-md-8">			
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'templates/content-portfolio' );  ?>
							<?php endwhile; // end of the loop. ?>
						</div> <!-- #main -->
						<div id="sidebar" class="col-md-4">
							<div class="sidebar-inner">
								<aside class="widget-area">
									<?php dynamic_sidebar( 'sidebar-portfoliosingle' ); ?>
								</aside>
							</div>
						</div> <!-- #sidebar -->
						
					<!-- IF BLOG WITH NO SIDEBAR -->
					<?php } else { ?>
						<div id="primary" class="col-md-12">			
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'templates/content-portfolio' );  ?>
							<?php endwhile; // end of the loop. ?>
						</div> <!-- #main -->
					<?php } ?>							
				</div><!-- .row -->
			</div> <!-- .container -->
		</div><!-- .wrapsemibox -->
	</div><!-- .pagephp with shortcode added -->
	
	<?php } else { ?>
	
	<!-- IF NO TOP SHORTCODE ADDED -->
		<div id="pagephp page-<?php the_ID(); ?>">
			<?php
			$parallaxId = array();
			$no_title 			= get_post_meta( $post->ID, '_mwow_ip_no_title', true );			
			$bg_color 			= get_post_meta( $post->ID, '_mwow_ip_bg_color', true );
			$textcolor 			= get_post_meta( $post->ID, '_mwow_ip_text_color', true );
			$titlesize 			= get_post_meta( $post->ID, '_mwow_ip_titlesize', true );
			$page_transparancy 	= get_post_meta( $post->ID, '_mwow_ip_page_transparancy', true );
			$use_texture	 	= get_post_meta( $post->ID, '_mwow_ip_use_texture', true );
			$active_pageheader	= get_post_meta( $post->ID, '_mwow_ip_active_pageheader', true );
			$header_padding	 	= get_post_meta( $post->ID, '_mwow_ip_header_padding', true );
			$header_freearea	 = get_post_meta( $post->ID, '_mwow_ip_freearea', true );			
			$header_titleanim	 = get_post_meta( $post->ID, '_mwow_ip_title_anim', true );
			$header_subtitleanim = get_post_meta( $post->ID, '_mwow_ip_subtitle_anim', true );
			$header_downarrow	 = get_post_meta( $post->ID, '_mwow_ip_downarrow_pageheader', true );
			$page_title 		= get_post_meta( $post->ID, '_mwow_ip_page_title', true );
			$page_subtitle 		= get_post_meta( $post->ID, '_mwow_ip_page_subtitle', true );
			$simage = get_post_meta( $post->ID, '_mwow_ip_background_url', true );
			$parallaxId[] = $post->post_name;
			$postId = get_the_ID();
			?>
			
			<!-- no shortcode and PAGE HEADER IS ACTIVATED -->
			<?php
			if( $active_pageheader != '' ) { ?>
				<section class="pageheaderpagephp parallax parallax-image" style="color:<?php echo $textcolor; ?>; background-color: <?php echo $bg_color; ?>; background-image:url(<?php if (is_array($simage)) { foreach ($simage as $attachment_id => $simage_img_full_url) {echo $simage_img_full_url;} }?>);">
					<div class="wrapsection" style="padding-top:<?php echo $header_padding; ?>; padding-bottom:<?php echo $header_padding; ?>; background-image:url(<?php if (is_array($use_texture)) {foreach ($use_texture as $attachment_id => $usetexture_img_full_url) {echo $usetexture_img_full_url;} }?>); background-repeat:repeat;">
						<div class="overlay" style="background-color: <?php echo $bg_color; ?>; opacity: <?php echo $page_transparancy; ?>;"></div>
						<div class="container">
							<div  class="parallax-content">
								<div class="title-area" style="color:<?php echo $textcolor; ?>;">
																			
											<h2 class="title wow <?php echo $header_titleanim;?>" wow-data-duration="0.8s">
												<div style="font-size:<?php echo $titlesize; ?>;display: inherit;"><?php if($page_title != '') { echo $page_title; } ?></div>
											</h2> 
											
										<?php	
										if( $page_subtitle != ''){ ?>
										<p class="subtitle wow <?php echo $header_subtitleanim;?>" wow-data-duration="0.8s"><?php echo $page_subtitle; ?></p>
										<?php }
									
										if( $header_freearea != ''){
										 echo do_shortcode ($header_freearea);?>
										<?php }
									
										if( $header_downarrow != '' ){ ?>
										<a href="#primary" class="downarrowpoint wow zoomIn goscroll"><i class="fa fa-angle-double-down"></i></a>
										<?php } 
									?>										
								</div> <!-- .section-title -->
																	
							</div> <!-- .parallax-content -->
						</div><!-- .container -->
					</div><!-- .wrapsection -->
				</section> <!-- .parallax -->
					
				<?php }  else { ?>
				<!-- no shortcode and PAGE HEADER IS NOT ACTIVATED, DISPLAY DEFAULT -->
				<section class="pageheaderpagephp parallax parallax-image" style="color:#fff;background-image:url(<?php echo get_template_directory_uri();?>/assets/img/headerdefault.jpg);">
					<div class="wrapsection" style="padding:80px 0px;">
						<div class="overlay" style="background-color: ; opacity: 0.8;"></div>
						<div class="container">
							<div class="parallax-content">
								<div class="title-area" style="color:#ffffff">
									
								</div> <!-- .section-title -->																		
							</div> <!-- .parallax-content -->
						</div>						
					</div>
				</section>
				<?php }?>
					
				<!-- display the content for page header for both, activated or not activated -->
				<div class="wrapsemibox">
					<div class="semiboxshadow text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/shp.png" class="img-responsive" alt="">
					</div>
					<div class="container">
						<div class="row">
							<!-- IF BLOG WITH SIDEBAR -->
							<?php if ( is_active_sidebar('sidebar-portfoliosingle') ) { ?>
								<div id="primary" class="col-md-8">			
									
									<?php while ( have_posts() ) : the_post(); ?>
										<div class="row">
											<?php get_template_part( 'templates/content-portfolio' );  ?>
										</div>
									<?php endwhile; // end of the loop. ?>
									
								</div> <!-- #main -->
								<div id="sidebar" class="col-md-4">
									<div class="sidebar-inner">
										<aside class="widget-area">
											<?php dynamic_sidebar( 'sidebar-portfoliosingle' ); ?>
										</aside>
									</div>
								</div> <!-- #sidebar -->			
								
							<!-- IF BLOG WITH NO SIDEBAR -->
							<?php } else { ?>
								<div id="primary" class="col-md-12">			
									<?php while ( have_posts() ) : the_post(); ?>
										<div class="row">
											<?php get_template_part( 'templates/content-portfolio' );  ?>
										</div>
									<?php endwhile; // end of the loop. ?>
								</div> <!-- #main -->
							<?php } ?>							
						</div><!-- .row -->
					</div> <!-- .container -->
					<?php if( !empty( $parallaxId ) )	{wp_enqueue_script( 'wowparallax' );} ?>
				</div><!-- .wrapsemibox -->
					
		</div><!-- .end pagephp with no shortcode added -->

		<?php } ?>
		
<div class="clearfix"></div>
<?php get_footer(); ?>