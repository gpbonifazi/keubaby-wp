<?php
global $smof_data; 
global $bbwoptions;
?>

<article <?php post_class("excerptitem"); ?> id="post-<?php the_ID(); ?>">
	<div class="excerptphp">
		
		<header class="entry-header text-center">	
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h2 class="entry-title excerpt">', '</h2>' ); ?></a>
				<div class="entry-meta text-center uppercase">					
				
				<?php							
				if ((isset($bbwoptions['switch_metatagsblogdate'])) && ($bbwoptions['switch_metatagsblogdate'] == '1'))	{ ?>
				<span class="wowmetadate"><i class="fa fa-clock-o"></i> <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></span> 
				<?php } 
				
				if ((isset($bbwoptions['switch_metatagsblogcomm'])) && ($bbwoptions['switch_metatagsblogcomm'] == '1')) { ?>
				<span class="wowmetacommentnumber"><i class="fa fa-comments"></i> <?php comments_popup_link( __( 'Leave a Comment', THEME_LANGUAGE_DOMAIN ), __( '1 Comment', THEME_LANGUAGE_DOMAIN ), __( '% Comments', THEME_LANGUAGE_DOMAIN ), '', __( 'Comments off', THEME_LANGUAGE_DOMAIN ) ); ?></span>
				<?php } ?>
				
				</div><!-- .entry-meta -->			
		</header>
		
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="entry-thumbnail">	
				<?php the_post_thumbnail('blogexcerpt'); ?>
			</div>
		<?php } ?>
		
		<div class="entry-content">
			<?php echo get_custom_excerpt(360); ?> <a href="<?php the_permalink(); ?>">[...]</a>
		</div><!-- .entry-content -->
		
		<div class="clearfix"></div>

		<div class="or-spacer">
			  <div class="mask"></div>
			  <span> <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a></span>
		</div>
		
		<div class="clearfix"></div>
	</div>
</article>