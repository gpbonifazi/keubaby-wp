<?php 

/*******************************************************
define
********************************************************/
define('THEME_LANGUAGE_DOMAIN', 'wow_calypso_theme');

/*******************************************************
requires
********************************************************/
require_once (get_template_directory() . '/admin/index.php');
require_once (get_template_directory() . '/components/customtypes.php');
require_once (get_template_directory() . '/components/meta/thememeta.php');
require_once (get_template_directory() . '/components/shortcodes/shortcodes.php');
require_once (get_template_directory() . '/components/shortcodes/init.php');
require_once (get_template_directory() . '/components/widgets/ultimate-posts.php');
require_once (get_template_directory() . '/components/page-builder/page-builder.php');
require_once (get_template_directory() . '/components/tgm/required-plugins.php');
require_once (get_template_directory() . '/components/updater/updater.php');


/*******************************************************
zolix_setup
********************************************************/
add_action( 'after_setup_theme', 'zolix_setup' );
if ( ! function_exists( 'zolix_setup' ) ){
	function zolix_setup() {
        if ( ! isset( $content_width ) ) $content_width = 1180;
        add_filter('widget_text', 'do_shortcode');
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_image_size( 'recentposts-thumb', 9999, 220 );
		load_theme_textdomain( THEME_LANGUAGE_DOMAIN, get_template_directory() . '/components/languages' );
		register_nav_menus( array(
		'primary' => __( 'Primary Menu', THEME_LANGUAGE_DOMAIN ),
		'footerm' => __( 'Footer Menu', THEME_LANGUAGE_DOMAIN ),
		) );
        
		}
}

/*******************************************************
zolix_load_scripts
********************************************************/
if ( ! function_exists( 'zolix_load_scripts' ) ){
	function zolix_load_scripts() {
	
	// Register css files
        wp_register_style( 'wowbootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', TRUE);
        wp_register_style( 'wowbxslider', get_template_directory_uri() . '/assets/css/jquery.bxslider.css', TRUE);
        wp_register_style( 'wowfontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css', TRUE);
		wp_register_style( 'wowanimate', get_template_directory_uri() . '/assets/css/animate.css', TRUE);
		
	// Enqueue styles
		wp_enqueue_style('wowbootstrap');	
		wp_enqueue_style('wowshortcodes');		
		wp_enqueue_style('wowfontawesome');
		wp_enqueue_style('wowanimate');	
		wp_enqueue_style('wowtheme', get_stylesheet_uri() );
		
		// Loads predefined color & dark skin
		global $smof_data;
		global $bbwoptions;
		global $altstyle;		
		if (isset($smof_data['alt_stylesheet'])):	
		$altstyle = $smof_data['alt_stylesheet'];
		wp_enqueue_style('wowaltstyle', get_template_directory_uri() . '/assets/css/skins/"'.$altstyle.'".css', false ,'1.0');
		endif;
		
		wp_enqueue_style('quick-style',get_template_directory_uri().'/quick-style.php',array(),false,'all');
		
	
	// Register js files	
		wp_register_script('wowbootstrap',get_template_directory_uri() .'/assets/js/bootstrap.js', 'jquery', false, true);
		wp_register_script('woweasing',get_template_directory_uri() .'/assets/js/easing.js', 'jquery', false, true);
		wp_register_script('wowsmoothscroll',get_template_directory_uri() .'/assets/js/smoothscroll.js', 'jquery', false, true);
		wp_register_script('wowwow',get_template_directory_uri() .'/assets/js/wow.js', 'jquery', false, true);
		wp_register_script('wowappear',get_template_directory_uri() .'/assets/js/appear.js', 'jquery', false, true);		
		wp_register_script('wowflexslider',get_template_directory_uri() .'/assets/js/flexslider.js', 'jquery', false, true);
		wp_register_script('wowparallax',get_template_directory_uri() .'/assets/js/parallax.js', 'jquery', false, true);
		wp_register_script('wowisotope',get_template_directory_uri() .'/assets/js/isotope.js', 'jquery', false, true);
		wp_register_script('wowcarousel',get_template_directory_uri() .'/assets/js/carousel.js', 'jquery', false, true);
		wp_register_script('wowcarouselblog',get_template_directory_uri() .'/assets/js/carousel-blog.js', 'jquery', false, true);
		wp_register_script('wowcarouselanything',get_template_directory_uri() .'/assets/js/carousel-anything.js', 'jquery', false, true);		
		wp_register_script('wowcountto',get_template_directory_uri() .'/assets/js/countto.js', 'jquery', false, true);
		wp_register_script('wowfitvids',get_template_directory_uri() .'/assets/js/fitvids.js', 'jquery', false, true);
		wp_register_script('wowtestimrotator',get_template_directory_uri() .'/assets/js/testimonial-rotator.js', 'jquery', false, true);
		wp_register_script('wowrecentfolio',get_template_directory_uri() .'/assets/js/recentportfolio.js', 'jquery', false, true);
		wp_register_script('wowtwitcycle',get_template_directory_uri() .'/components/twitteroauth/js/jquery.cycle.all.min.js', 'jquery', false, true);
		wp_register_script('wowtwitrotate',get_template_directory_uri() .'/components/twitteroauth/js/rotating_tweet.js', 'jquery', false, true);
		wp_register_script('wowcommon',get_template_directory_uri() .'/assets/js/common.js', 'jquery', false, true);
		
	// Enqueue scripts
		wp_enqueue_script('jquery');		
		wp_enqueue_script('wowbootstrap');
		wp_enqueue_script('woweasing');
		wp_enqueue_script('wowsmoothscroll');
		wp_enqueue_script('wowwow');
		wp_enqueue_script('wowappear');
		wp_enqueue_script('wowfitvids');		
		wp_enqueue_script('wowcommon');
	}
	
	add_action('wp_enqueue_scripts', 'zolix_load_scripts');
}

/*********************************************************************************************
google_map_head
*********************************************************************************************/
function google_map_head(){
		echo "<!-- Google Maps API v3 -->  \n";
		echo "<script src='http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script> \n \n";
}
add_action('wp_head', 'google_map_head');


/*********************************************************************************************
zolix_widgets_init
*********************************************************************************************/
function zolix_widgets_init() {
	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'sidebar-blog',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		
	register_sidebar(array( 
		'name' 			=> 'Portfolio Item Sidebar',
		'id' 			=> 'sidebar-portfoliosingle',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 1',
		'id' 			=> 'sidebar-random1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 2',
		'id' 			=> 'sidebar-random2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	

	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 3',
		'id' 			=> 'sidebar-random3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 4',
		'id' 			=> 'sidebar-random4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 5',
		'id' 			=> 'sidebar-random5',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 6',
		'id' 			=> 'sidebar-random6',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	

	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 7',
		'id' 			=> 'sidebar-random7',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Random Sidebar 8',
		'id' 			=> 'sidebar-random8',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar(array( 
		'name' 			=> 'Bottom',
		'id' 			=> 'bottom',
		'description' 	=> 'Shown before footer',
		'before_title' 	=> '<h3 class="widget_title">',
		'after_title' 	=> '</h3>',
		'before_widget' => '<div class="col-md-3 bottom-widget"><div id="%1$s" class="widget %2$s" >',
		'after_widget' 	=> '</div></div>'
	) );
}
add_action( 'widgets_init', 'zolix_widgets_init' );


/*********************************************************************************************
//wp_bootstrap_navwalker
*********************************************************************************************/
class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= ' dropdown';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
			   $atts['href'] = ! empty( $item->url ) ? $item->url : '';
			   //$atts['data-toggle']   = 'dropdown';
			   $atts['class']           = 'dropdown-toggle';
			} else {
			   $atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}


/*********************************************************************************************
wow_comment
*********************************************************************************************/
if ( ! function_exists( 'wow_comment' ) ) :
function wow_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', THEME_LANGUAGE_DOMAIN ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', THEME_LANGUAGE_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</li>
	<?php else : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">			
				
			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>					
			</div><!-- .comment-author -->
			
			<a class="reply" style="color:inherit;"> 
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</a><!-- .reply -->
			
			
			<div class="comment-content">			
				<div class="comment-metadata">
					<?php printf( __( '%s <span class=""></span>', THEME_LANGUAGE_DOMAIN ), sprintf( '<span style="font-weight:700;" class="fn">%s</span>', get_comment_author_link() ) ); ?>					
					
					
					
					<a style="display:block;color:#adadad;font-size:12px;" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', THEME_LANGUAGE_DOMAIN ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					
					
				</div><!-- .comment-metadata -->
				
				
				
				
				
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', THEME_LANGUAGE_DOMAIN ); ?></p>
				<?php endif; ?>							
				<div class="comment-text">
					<?php comment_text(); ?>					
					<?php edit_comment_link( __( 'Edit comment', THEME_LANGUAGE_DOMAIN ), '<span class="clearfix edit-link">', '</span>' ); ?>
				</div><!-- .comment-edit -->			
			</div>
			
		</article><!-- .comment-body -->
	</li>
	<?php
	endif;
}
endif;

/*******************************************************
wow_pagination
********************************************************/
function wow_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/*********************************************************************************************
get_custom_excerpt
*********************************************************************************************/
function get_custom_excerpt($count){  
  global $post;
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " ")); 
  return $excerpt;
}

/*******************************************************
wowt_paging_nav
********************************************************/
if ( ! function_exists( 'wowt_paging_nav' ) ) :
function wowt_paging_nav() {	
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">		
		<div class="nav-links clearfix">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous pull-left"><?php next_posts_link( __( '<span class="meta-nav"><i class="fa fa-angle-left"></i> </span> Older posts',  THEME_LANGUAGE_DOMAIN ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next pull-right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"><i class="fa fa-angle-right"></i> </span>',  THEME_LANGUAGE_DOMAIN ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/*******************************************************
wowt_post_nav
********************************************************/
if ( ! function_exists( 'wowt_post_nav' ) ) :
function wowt_post_nav() {	
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">		
		<div class="nav-links clearfix">
			<?php
				previous_post_link( '<div class="nav-previous pull-left">%link</div>', _x( '<span class="meta-nav"></span> %title', 'Previous post link', THEME_LANGUAGE_DOMAIN ) );
				next_post_link(     '<div class="nav-next pull-right">%link</div>',     _x( '%title <span class="meta-nav"></span>', 'Next post link',  THEME_LANGUAGE_DOMAIN ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

/*******************************************************
wowt_categorized_blog
********************************************************/
function wowt_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'zolix_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wowt_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so zolix_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so zolix_categorized_blog should return false.
		return false;
	}
}

/*******************************************************
wowt_category_transient_flusher
********************************************************/
function wowt_category_transient_flusher() {	
	delete_transient( 'wowt_categories' );
}
add_action( 'edit_category', 'wowt_category_transient_flusher' );
add_action( 'save_post',     'wowt_category_transient_flusher' );