<?php
class ZillaShortcodes {

	function __construct() 
	{		
		define('ZILLA_TINYMCE_URI', get_template_directory_uri() . '/components/shortcodes/tinymce/');
		
		add_action('init', array(&$this, 'init'));
		add_action('admin_init', array(&$this, 'admin_init'));
	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{
		if( ! is_admin() )
		{

		}
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
		
		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
		}
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		if ( floatval(get_bloginfo('version')) >= 3.9){
			$plugin_array['zillaShortcodes'] = get_template_directory_uri() . '/components/shortcodes/tinymce/plugin.js';
		} 
	return $plugin_array;
	}

	// --------------------------------------------------------------------------

	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'zilla_button' );
		return $buttons;
	}
	
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		// css
		wp_enqueue_style( 'editorstyle', get_template_directory_uri() . '/components/shortcodes/tinymce/css/editorstyle.css', false, '1.0', 'all' );

	}
	
}
$zilla_shortcodes = new ZillaShortcodes();

?>