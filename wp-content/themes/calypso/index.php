<?php get_header(); ?>
<div class="indexphp">

	<section class="pageheaderpagephp parallax parallax-image" style="background-image:url(<?php echo $bbwoptions['blogindexheader_upload']; ?>);">
		<div class="wrapsection" style="padding:<?php echo $bbwoptions['blogindexheader_padding']; ?> 0px;">
			<div class="overlay" style="background-color:<?php echo $bbwoptions['blogindexheader_background_color']; ?> ; opacity: <?php echo $bbwoptions['blogindexopacity_text']; ?>;"></div>
			<div class="container">
				<div class="parallax-content">
					<div class="title-area">
						<h2 class="title wow zoomIn">	
							<span style="color: <?php echo $bbwoptions['blogindexheader_font_style']['color']; ?>;	font-size: <?php echo $bbwoptions['blogindexheader_font_style']['size']; ?>;display: inherit;"><?php echo $bbwoptions['blogtitle_text']; ?> </span>
						</h2>
					</div> <!-- .section-title -->																		
				</div> <!-- .parallax-content -->
			</div>						
		</div>
	</section>
	
	<div class="wrapsemibox">
		<div class="semiboxshadow text-center">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/shp.png" class="img-responsive" alt="">
		</div>
		<div class="container">
			<div class="row">
				<!-- IF BLOG WITH SIDEBAR -->
				<?php if ( is_active_sidebar('sidebar-blog') ) { ?>
					<div id="primary" class="col-md-8">			
						<?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'templates/content', 'excerpt' );  ?>
						<?php endwhile; // end of the loop. ?>
						<div class="clearfix"><?php wow_pagination();?></div>
						<?php 
							else : 
								get_template_part( 'templates/content', 'none' );
							endif; 
						?>
					</div> <!-- #main -->
					<div id="sidebar" class="col-md-4">
						<div class="sidebar-inner">
							<aside class="widget-area">
								<?php dynamic_sidebar( 'sidebar-blog' ); ?>
							</aside>
						</div>
					</div> <!-- #sidebar -->			
					
				<!-- IF BLOG WITH NO SIDEBAR -->
				<?php } else { ?>
					<div id="primary" class="col-md-12">			
						<?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'templates/content', 'excerpt' );  ?>
						<?php endwhile; // end of the loop. ?>
						<div class="clearfix"><?php wow_pagination();?></div>
						<?php 
							else : 
								get_template_part( 'templates/content', 'none' );
							endif; 
						?>
					</div> <!-- #main -->
				<?php } ?>							
			</div><!-- .row -->
		</div> <!-- .container -->
		<?php if (isset($bbwoptions['blogindexheader_upload']))
							   {
									if(!empty($bbwoptions['blogindexheader_upload'])){ wp_enqueue_script( 'wowparallax' );}
								}?> 
		
	</div><!-- .wrapsemibox -->

</div>
		
<?php get_footer(); ?>