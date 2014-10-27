<?php
class PostWidget extends WP_Widget
{
    function PostWidget(){
		$widget_ops = array('description' => 'Displays Your Post Updates');
		$control_ops = array('width' => 300, 'height' => 300);
		parent::WP_Widget(false,$name='Post Updates Widget',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Post Updates' : $instance['title']);
		$PostCount = empty($instance['PostCount']) ? '' : $instance['PostCount'];

		echo $before_widget;

		if ( $title )
		echo $before_title . $title . $after_title;
?>
		
		<?php 
		global $post;
		$my_query = new WP_Query("showposts=$PostCount"); while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; ?>
		<div class="PostWrap">
			<div style="width:72px;float:left; margin-right:10px;">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( ); ?></a>
			</div>
			<p class="postwidgettitle" style="font-weight:700;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<p class="postwidgetinfo"><?php the_time('m/d/Y'); ?> | <?php comments_popup_link('0 Comments','1 Comment','% Comments'); ?></p>
		</div><!-- END PostWrap -->
		<?php endwhile; ?>
		<div style="clear:both;"></div>

<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['PostCount'] = stripslashes($new_instance['PostCount']);

		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'Post Updates', 'PostCount'=>'', 'PostID'=>'') );

		$title = htmlspecialchars($instance['title']);
		$PostCount = htmlspecialchars($instance['PostCount']);
		$PostID = htmlspecialchars($instance['PostID']);

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Post Update Count
		echo '<p><label for="' . $this->get_field_id('PostCount') . '">' . 'Update Count (ex: 3):' . '</label><input class="widefat" id="' . $this->get_field_id('PostCount') . '" name="' . $this->get_field_name('PostCount') . '" type="text" value="' . $PostCount . '" /></p>';	
	}

}// end PostWidget class

function PostWidgetInit() {
  register_widget('PostWidget');
}

add_action('widgets_init', 'PostWidgetInit');

?>