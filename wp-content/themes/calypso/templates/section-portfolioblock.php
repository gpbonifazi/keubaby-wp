<?php
/**
 * Displaying slider for Post format Image if set
 */
 global $post;
wp_enqueue_script( 'wowisotope' );
?>

<div id="main" class="templateportfoliophp">
	<div class="row">	
		<div class="col-xs-12 text-center isoportfoliofilter">
			 <ul id="filters">
				<?php
					$terms = get_terms('portfolio-categories');
					$count = count($terms);
						echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">All</a></li>';
					if ( $count > 0 ){
			 
						foreach ( $terms as $term ) {
			 
							$termname = strtolower($term->name);
							$termname = str_replace(' ', '-', $termname);
							echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
						}
					}
				?>
			</ul>			
		</div>
	</div>

	
	<div id="isoposts" class="isoportfolio">		
		<!-- Portfolio STARTS
		================================================== -->
		<?php
		/* 
		Query the post 
		*/
		
		$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args );
		  while ( $loop->have_posts() ) : $loop->the_post(); 
		 
		/* 
		Pull category for each unique post using the ID 
		*/
		$terms = get_the_terms( $post->ID, 'portfolio-categories' );	
			 if ( $terms && ! is_wp_error( $terms ) ) : 
		 
				 $links = array();
		 
				 foreach ( $terms as $term ) {
					 $links[] = $term->name;
				 }
		 
				 $tax_links = join( " / ", str_replace('', '-', $links));          
				 $tax = strtolower($tax_links);
			 else :	
			 $tax = '';					
			 endif; 
		 
		$imgurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		<div class="all item <?php echo $tax;?>">
			<div class="pic">				
				<?php echo the_post_thumbnail();?>				
				<span class="pic-caption come-left">
					<p class="portfo-captions">
						<a href="<?php echo get_permalink(); ?>"><i class="fa fa-plus link-caption"></i></a>
						<span class="title-caption"><?php echo get_the_title(); ?></span>
						<span class="taxonomy-caption"><?php echo $tax_links;?></span>
					</p>					
				</span>
			</div>
			<span class="descrii"><?php echo get_the_title(); ?></span>
		</div>
		<?php endwhile; ?>
	</div>
</div>