<?php
global $smof_data; 
global $bbwoptions;
$no_title = get_post_meta( $post->ID, '_mwow_ip_no_title', true );
?>

<article <?php post_class("contentitem"); ?> id="post-<?php the_ID(); ?>">
	<div class="contentportfoliophp">
		<div class="col-md-12">
						<header class="entry-header text-center">
							<?php if( $no_title != 'on' ) {	?>
							<?php the_title( '<h1 class="entry-title singlephptitle">', '</h1>' ); ?>
							<?php }?>					
						</header>
						
			<?php wowt_post_nav(); ?>
			<?php wp_link_pages(); ?>
		</div>
	</div>
		
		<div class="clearfix"></div>
		
		<div class="entry-content">
			<?php the_content(); ?>			
		</div><!-- .entry-content -->
		
		<?php 
		
		if ((isset($bbwoptions['switch_blogtags'])) && ($bbwoptions['switch_blogtags'] == '1')) { ?>
			<div class="entry-footer">
				<div class="tagcloud"><?php echo get_the_tag_list(' ',' ','');?></div>
			</div><!-- .entry-footer -->
		<?php } ?>

		
		<div class="clearfix"></div>		
		<div class="col-md-12">
		<?php
		if ( comments_open() || '0' != get_comments_number() )
		comments_template();
		?>				
		</div>
		<div class="clearfix"></div>
	
</article>