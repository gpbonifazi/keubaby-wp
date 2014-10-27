<?php
get_header(); ?>

<section class="pageheaderpagephp parallax parallax-image">
	<div class="wrapsection" style="padding:80px 0px;">
		<div class="overlay" style="background-color: ; opacity: 0.8;"></div>
		<div class="container">
			<div class="parallax-content">
				<div class="title-area" style="color:#ffffff">
					<h2 class="title wow zoomIn">	
						<span style="font-size:35px;display: inherit;"><?php _e( 'Page not found', THEME_LANGUAGE_DOMAIN ); ?></span>
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
		
			<div class="col-md-12">
				<p class="max60"><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', THEME_LANGUAGE_DOMAIN ); ?></p>
				<br/>
				<div class="max60"><?php get_search_form(); ?></div>
			</div>
		

		<div class="clearfix"></div><br/><br/>
			<div class="col-md-4">
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			</div>
				
			<div class="col-md-4">
				<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', THEME_LANGUAGE_DOMAIN ), convert_smilies( '' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
				?>
			</div>

			<div class="col-md-4">
				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
			</div>			

		
		<div class="clearfix"></div>
	</div> <!-- .container -->
</div><!-- .wrapsemibox -->
<?php get_footer(); ?>