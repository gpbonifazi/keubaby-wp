<?php
/**
 * Displaying single slider
 */
get_header();
global $post;
while ( have_posts() ) : the_post();
get_template_part( 'templates/section','slider' );
wp_reset_query();
endwhile; // end of the loop
get_footer(); ?>


	