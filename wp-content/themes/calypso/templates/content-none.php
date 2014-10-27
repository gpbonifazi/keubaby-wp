<?php
/**
 * The template part for displaying a message when posts cannot be found.
 */
?>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', THEME_LANGUAGE_DOMAIN ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>	
		<h5 class="uppercase wow bounceIn" style="font-weight:300;"><?php _e( 'Sorry, but nothing matched your search terms.<br/> Please try again with some different keywords.', THEME_LANGUAGE_DOMAIN ); ?></h5>
		<div style="max-width:350px;margin-top:25px;"><?php get_search_form(); ?></div>
	<?php else : ?>

	<p><?php _e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', THEME_LANGUAGE_DOMAIN ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>


