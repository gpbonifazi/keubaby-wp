<?php get_header(); ?>
<div class="archivephp">

	<section class="pageheaderpagephp parallax parallax-image" style="color:#fff;background-image:url(<?php echo get_template_directory_uri();?>/assets/img/headerdefault.jpg);">
		<div class="wrapsection" style="padding:80px 0px;">
			<div class="overlay" style="background-color: ; opacity: 0.8;"></div>
			<div class="container">
				<div class="parallax-content">
					<div class="title-area" style="color:#ffffff">
						<h2 class="title wow zoomIn">	
							<span style="font-size:35px;display: inherit;">
							<?php
							if ( is_category() ) :
								printf( __( ' Category %s', THEME_LANGUAGE_DOMAIN ), ' <i>' . single_cat_title() . '</i>' );

							elseif ( is_tag() ) :								
								printf( __( ' Tag %s', THEME_LANGUAGE_DOMAIN ), ' <i>' . single_tag_title() . '</i>' );

							elseif ( is_author() ) :
								printf( __( 'Posts by %s', THEME_LANGUAGE_DOMAIN ), '<i>' . get_the_author() . '</i>' );

							elseif ( is_day() ) :
								printf( __( 'Day %s', THEME_LANGUAGE_DOMAIN ), '<i>' . get_the_date() . '</i>' );

							elseif ( is_month() ) :
								printf( __( 'Posts from  %s', THEME_LANGUAGE_DOMAIN ), '<i>' . get_the_date( _x( 'F Y', 'monthly archives date format', THEME_LANGUAGE_DOMAIN ) ) . '</i>' );

							elseif ( is_year() ) :
								printf( __( 'Year  %s', THEME_LANGUAGE_DOMAIN ), '<i>' . get_the_date( _x( 'Y', 'yearly archives date format', THEME_LANGUAGE_DOMAIN ) ) . '</i>' );
						
							else :
								_e( '<i>Archives</i>', THEME_LANGUAGE_DOMAIN );

							endif;
							?>
							</span>
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
				<!-- IF ARCHIVE WITH SIDEBAR -->
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
					
				<!-- IF ARCHIVE WITH NO SIDEBAR -->
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
		<?php if( !empty( $parallaxId ) )	{wp_enqueue_script( 'wowparallax' );} ?>
	</div><!-- .wrapsemibox -->

</div>
		
<?php get_footer(); ?>