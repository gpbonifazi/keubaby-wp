<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title uppercase">			
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', THEME_LANGUAGE_DOMAIN ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<?php endif;?>

		<ol class="comment-list">
			<?php wp_list_comments( array( 'callback' => 'wow_comment','avatar_size'=>65 ) );	?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation pagination clearfix" role="navigation">
			<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
		</nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php		
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( '', THEME_LANGUAGE_DOMAIN ); ?></p>
	<?php endif; ?>

	
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
		$fields =  array(       
        'author' => '<div class="row commentrow"><div class="col-md-4 comment-form-author">' . '<label for="author">' . __( 'Name', THEME_LANGUAGE_DOMAIN ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' .
        '<div class="input-prepend"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . 'aria-required="true"' . ' required /></div></div>',
        'email'  => '<div class="col-md-4 comment-form-email"><label for="email">' . __( 'E-mail (not visible)', THEME_LANGUAGE_DOMAIN ) . ( $req ? ' <span class="required">*</span><br/>' : '' ) . '</label>' . 
        '<div class="input-prepend"><input required id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="20"' . 'aria-required="true"' . ' required /></div></div>',
        'url'  => '<div class="col-md-4 comment-form-url"><label for="url">' . __( 'Website', THEME_LANGUAGE_DOMAIN ) . '</label>' . 
        '<div class="input-prepend"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="20" /></div></div></div>'
        );
    $comments_args = array(
        'fields' => $fields,         
        'title_reply' => __( 'Leave a Reply', THEME_LANGUAGE_DOMAIN ),
		'label_submit' => __( 'Submit Comment', THEME_LANGUAGE_DOMAIN ),
		'title_reply_to' => __( 'Leave a Reply to %s', THEME_LANGUAGE_DOMAIN ),
		'cancel_reply_link' => __( 'Cancel Reply', THEME_LANGUAGE_DOMAIN ),
		'comment_field' => '<br/><div class="row commentrow comment-form-comment"><div class="col-md-12"><label for="comment">' . __( 'Comment', THEME_LANGUAGE_DOMAIN ) . '</label><textarea id="comment" name="comment" rows="5" aria-required="true"></textarea></div></div>',
		'comment_notes_before' => '<p class="comment-notes">' . __( '', THEME_LANGUAGE_DOMAIN) .'</p>',
		'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf(__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),' <code>' . allowed_tags() . '</code>') . '</p>',
		'must_log_in' => '<div class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', THEME_LANGUAGE_DOMAIN ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</div>',
		'logged_in_as' => '<div class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', THEME_LANGUAGE_DOMAIN ),admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</div>',
        );
    comment_form( $comments_args );
	?>

</div>