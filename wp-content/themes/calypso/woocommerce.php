<?php
get_header();
global $page;
global $smof_data; 
global $bbwoptions;
?>	
<div class="woocommercephp" id="page-<?php the_ID(); ?>">

<section class="pageheaderpagephp parallax parallax-image" style="color:#fff;background-image:url(<?php echo get_template_directory_uri();?>/assets/img/headerdefault.jpg);">
	<div class="wrapsection" style="padding:80px 0px;">
		<div class="overlay" style="background-color: #333; opacity: 0.2;"></div>
		<div class="container">
			<div class="parallax-content">
				<div class="title-area" style="color:#ffffff">
					<h2 class="title wow zoomIn">	
						<span style="font-size:35px;display: inherit;"></span>
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
		<?php if ( have_posts() ) :
			 woocommerce_content(); ?>								
		<div class="clearfix"></div>
		<?php endif; ?>
		<div class="clearfix"></div>
	</div> <!-- .container -->
	<?php wp_enqueue_script( 'wowparallax' );?>
</div><!-- .wrapsemibox -->

</div><!-- .woocommercephp -->
<?php get_footer(); ?>