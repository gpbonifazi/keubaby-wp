<?php
global $smof_data; 
global $bbwoptions;
global $post;
$no_title = get_post_meta( $post->ID, '_mwow_ip_no_title', true );
?>

<article <?php post_class("contentitem"); ?> id="post-<?php the_ID(); ?>">
	<div class="contentphp">
		<div class="row">
			<div class="col-md-12">
				<header class="entry-header text-center">	
						<?php if( $no_title != 'on' ) {	?>
						<?php the_title( '<h1 class="entry-title singlephptitle">', '</h1>' ); ?>
						<?php }?>
						
						<?php if( $no_title != 'on' ) {	?>						
						<div class="entry-meta text-center uppercase">
						<?php } else { ?>
						<div class="entry-meta text-center uppercase" style="margin-top:0px;">
						<?php } ?>
						
							<?php
							
							if ((isset($bbwoptions['switch_metatagsblogdate'])) && ($bbwoptions['switch_metatagsblogdate'] == '1'))	{ ?>
							<span class="wowmetadate"><i class="fa fa-clock-o"></i> <?php the_time('d'); ?> <?php the_time('M'); ?> <?php the_time('Y'); ?></span> 
							<?php } 
							
							if ((isset($bbwoptions['switch_metatagsblogauthor'])) && ($bbwoptions['switch_metatagsblogauthor'] == '1'))	{ ?>						
							<span class="wowmetaauthor"><i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></span>
							<?php }
							
							if ((isset($bbwoptions['switch_metatagsblogcat'])) && ($bbwoptions['switch_metatagsblogcat'] == '1')) { ?>
							<span class="wowmetacats"><i class="fa fa-folder-open"></i>
							<?php
							$categories = get_the_category();
							$separator = ' , ';
							$output = '';
							if($categories){
								foreach($categories as $category) {
									$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( "", $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
								}
							echo trim($output, $separator);}
							?>
							</span>
							<?php }
							
							if ((isset($bbwoptions['switch_metatagsblogcomm'])) && ($bbwoptions['switch_metatagsblogcomm'] == '1')) { ?>
							<span class="wowmetacommentnumber"><i class="fa fa-comments"></i> <?php comments_popup_link( __( 'Leave a Comment', THEME_LANGUAGE_DOMAIN ), __( '1 Comment', THEME_LANGUAGE_DOMAIN ), __( '% Comments', THEME_LANGUAGE_DOMAIN ), '', __( 'Comments off', THEME_LANGUAGE_DOMAIN ) ); ?></span>
							<?php } ?>
						
						</div><!-- .entry-meta -->
					
					
				</header>
			</div>
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
		<?php } 
		
		if ((isset($bbwoptions['switch_prevnextpost'])) && ($bbwoptions['switch_prevnextpost'] == '1')) { ?>
			<div class="row">
				<div class="col-md-12">
					<?php wowt_post_nav(); ?>
					<?php wp_link_pages(); ?>
				</div>	
			</div>			
		<?php } ?>
		
		<div class="clearfix"></div>		
		
		<?php
		if ( comments_open() || '0' != get_comments_number() )
		comments_template();
		?>				
		
		<div class="clearfix"></div>
	
</article>