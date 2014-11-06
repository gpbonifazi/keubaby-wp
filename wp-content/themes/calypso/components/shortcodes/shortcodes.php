<?php
add_action('admin_head', 'shortcode_button');

function shortcode_button() {
echo'<style>.mceIcon.mce_mygallery_button{background:url('.get_bloginfo('template_directory').'/components/shortcodes/img/shortcodes.png) no-repeat  !important;width:20px;height:20px;cursor:pointer;}</style>';
}

	
	/*
	==========================================================
	Suuport shortcode in widgets
	==========================================================
	*/
	add_filter('widget_text', 'do_shortcode');

	/*
	==========================================================
	Clean Shortcodes
	==========================================================
	*/
	function wow_clean_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'wow_clean_shortcodes');
	
/*===============================================================
CHAPTER 1. LAYOUT

- Container
- Row
- Columns
================================================================*/
	
	/*
	==========================================================
	Container [container]...[/container]
	==========================================================
	*/
	
	function wow_shortcode_container( $atts, $content ) {

		$output = '<div class="container">';
		$output .= do_shortcode( $content );
		$output .= '</div>';	
		return $output;}

	add_shortcode('container', 'wow_shortcode_container');
	
	
	/*
	==========================================================
	Row [row]...[/row]
	==========================================================
	*/
	
	function wow_shortcode_row( $atts, $content ) {

		$output = '<div class="row">';
		$output .= do_shortcode( $content );
		$output .= '</div>';	
		return $output;}

	add_shortcode('row', 'wow_shortcode_row');

	/*
	==========================================================
	Columns [col size="6" align="center"]...[/col]
	==========================================================
	*/
	
	function wow_shortcode_columns( $atts, $content ) {
		extract( shortcode_atts( array(
		'size' => '',
		'align' => '',
		), $atts ) );

		$output = '<div class="col-md-'.$size.' text-'.$align.'">';
		$output .= do_shortcode( $content );
		$output .= '</div>';	
		return $output;}

	add_shortcode('col', 'wow_shortcode_columns');
	
	
/*=================================
CHAPTER 2. TEXT 

- Button 
- Alert 
- Icon 
- List 
- Colorme 
- Panel 
- Header1 
- Header 2
- Preformatted Text
- Narrow Text
- Arrow
===================================*/
	
	/*
	======================================================================================
	Button Group
	[button_group]	shortcode buttons here	[/button_group]
	======================================================================================
	*/
	
	function wow_shortcode_button_group( $atts, $content ) {

		$output = '<div class="btn-group">';
		$output .= do_shortcode( $content );
		$output .= '</div>';	
		return $output;}

	add_shortcode('button_group', 'wow_shortcode_button_group');

	/*
	======================================================================================
	Buttons 
	[button type="primary" size="lg" url="#" icon="search" target="" text="Purchase Now"]
	======================================================================================
	*/
	
	function wow_shortcode_buttons( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
		'size' => 'default', /* small, medium, large */
		'url'  => '',
		'text' => '',
		'icon' => '',
		'target' => '',
		'animtype' => '',
		'after' => '',
		'duration' => '',
		), $atts ) );

		$type = "btn-" . $type;


		if($size == "default"){
			$size = "";
		}
		else{
			$size = "btn-" . $size;
		}

		if($icon == ''){
			$icon = '';
		}
		if(!empty($icon)){
			$icon = '<i class="fa fa-' . $icon . '"></i> ';
		}

		$output = '<a href="' . $url . '" target="' . $target . '" class="btn '. $type . ' ' . $size . ' wow '. $animtype . '" data-wow-delay="'. $after . '" data-wow-duration="'. $duration . '">';
		$output .= $icon;
		$output .= $text;
		$output .= '</a>';

		return $output;
	}

	add_shortcode('button', 'wow_shortcode_buttons'); 
	
	
	/*
	==========================================================
	Alert [wow_alert type="success" heading="Congrats!"]You're the best![/wow_alert]
	Types: info, success, danger, warning
	==========================================================
	*/
	if ( ! function_exists( 'wow_alert_sh' ) ):
	function wow_alert_sh($atts, $content = null) {
	   extract(shortcode_atts(array('type' => 'alert', 'heading' => ''), $atts));
	   if ($type != "alert") {
	   return '<div class="alert alert-'.$type.' fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>'. do_shortcode($heading) .'</strong><p> ' . do_shortcode($content) . '</p></div>';
	   } else {
	   return '<div class="'.$type.' fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>'. do_shortcode($heading) .'</strong>' . do_shortcode($content) . '</div>';
	   }
	}
	add_shortcode('wow_alert', 'wow_alert_sh');
	endif;	
	
	
	/*
	==========================================================
	Icon [wow_icon type="search" size="14"]
	==========================================================
	*/
	
	if ( ! function_exists( 'wow_icon_sh' ) ):
	function wow_icon_sh($atts, $content = null) {

		extract( shortcode_atts( array( 'type' => 'type', 'color' => 'color', 'size' => '' ), $atts ) );
		return '<i class="fa fa-'.$type.'" style="font-size:' . $size . 'px;"></i>';
	}
	add_shortcode('wow_icon', 'wow_icon_sh');
	endif;
	
	
	/*
	==========================================================
	Color me [wow_colorme]...[/wow_colorme]
	==========================================================
	*/
	
	if( !function_exists('wow_colorme') ) {
		function wow_colorme_shortcode( $atts, $content = null ) {
		   return '<span class="colortext stresscolor">'.do_shortcode($content).'</span>';
		}
		add_shortcode('wow_colorme', 'wow_colorme_shortcode');
	}
	
	/*
	==========================================================
	Lists [wow_list style="check/circleok/arrow/star/doublearrow/chevron/hand/thumb/asterisk/circlearrow/circleplus/longarrow"]<li>Cars</li><li>Dolls</li>[/wow_list]
	==========================================================
	*/
	
	if( !function_exists('wow_list_shortcode') ) {
		function wow_list_shortcode( $atts, $content = null  ) {
			extract( shortcode_atts( array(
				'style' => '',
			  ),
			  $atts ) );
		 return '<div class="unstyle"><ul class="'. $style .'list">' . do_shortcode($content) . '</ul></div>';
		}
		add_shortcode( 'wow_list', 'wow_list_shortcode' );
	}
	
	/*
	==========================================================
	Panel [wow_panel]
	==========================================================
	*/
	
	if( !function_exists('wow_panel_shortcode') ) {
	function wow_panel_shortcode( $atts, $content = null ) {
			extract( shortcode_atts( array( 'color' => '' ), $atts ) );
		   return '<div class="wowpanel" style="border-left:7px solid '.$color.';">' . do_shortcode($content) . '</div>';
		}
		add_shortcode( 'wow_panel', 'wow_panel_shortcode' );
	}
	
	/*
	==========================================================
	Header 1 [wow_header text="My title" subtext="My Subtitle" align="center"]
	==========================================================
	*/
	function wow_shortcode_header( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'text' => '',
		'subtext' => '',
		'align' => '',
		), $atts ) );

		if($subtext == "default"){
			$subtext = "";
		}
		else{
		$subtext = ' <small>'. $subtext . '</small>';
		}

		$output = '<div class="clearfix page-header text-'.$align.'"><h1>'.$text.'';
		$output .=$subtext;
		$output .= '</h1></div>';

		return $output;
	}

	add_shortcode('wow_header', 'wow_shortcode_header');
	
	/*********************************************************************************************
	Header2 [header2 text="" color="" align="center/left"]
	*********************************************************************************************/
	if( !function_exists('wow_header2_shortcode') ) {	
	function wow_header2_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'text' => '',
		'color' => '',
		'align' => '',
		'margintop' => '',
		), $atts ) );
		   return '<div class="clearfix text-'.$align.'"><h2 class="header3" style="margin-top:'.$margintop.'; color:'.$color.';">'.$text.'</h2><hr class="forh3"></div>';
		}
		add_shortcode( 'header2', 'wow_header2_shortcode' );
	}
	
	/*
	==========================================================
	Preformatted Text [wow_pre]...[/wow_pre]
	==========================================================
	*/
	
	if ( ! function_exists( 'wow_pre_sh' ) ):
	function wow_pre_sh($atts, $content = null) {

		extract( shortcode_atts( array( 'type' => 'type', 'color' => 'color', 'size' => '' ), $atts ) );
		return '<pre style="color:inherit;">' . $content . '</pre>';
	}
	add_shortcode('wow_pre', 'wow_pre_sh');
	endif;	
	
	
	/*
	==========================================================
	Narrow Text [wow_max width="80%" align="left/center"]
	==========================================================
	*/
	
	if( !function_exists('wow_max_shortcode') ) {
	function wow_max_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array( 'align' => '', 'width' => '' ), $atts ) );
		   return '<div style="max-width:'.$width.'; margin:0px auto; text-align:'.$align.'">' . do_shortcode($content) . '</div>';
		}
		add_shortcode( 'wow_max', 'wow_max_shortcode' );
	}
	
	
	/*
	==========================================================
	Arrow [wow_arrow to="up/down" id="#"]
	==========================================================
	*/
	
	if( !function_exists('wow_arrow_shortcode') ) {
	function wow_arrow_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array( 'to' => '', 'id' => '' ), $atts ) );
		   return '<a href="'.$id.'" class="downarrowpoint wow zoomIn goscroll"><i class="fa fa-angle-double-'.$to.'"></i></a>';
		}
		add_shortcode( 'wow_arrow', 'wow_arrow_shortcode' );
	}
	
	
	
	
/*=================================
CHAPTER 3. ELEMENTS

- Accordion
- Counter
- Tabs
- Table
- Toggle
- Progress Bars
- Team
- Pricing
===================================*/	
	
	/*
	==========================================================
	Counter [wow_count number="" icon="" title=""]
	==========================================================
	*/
	
	if ( ! function_exists( 'wow_count_sh' ) ):
	function wow_count_sh($atts, $content = null) {
		wp_enqueue_script('wowcountto');
		extract( shortcode_atts( array( 'number' => '', 'icon' => '', 'title' => '' ), $atts ) );
		return '<div class="funfacts text-center">
                        <div class="icon">
                            <i class="fa fa-' . $icon . '"></i>
                        </div>
                        <h2 class="counter" data-from="0" data-to="' . $number . '" data-speed="2500"></h2>
                        <h4>' . $title . '</h4>
                 </div>';
	}
	add_shortcode('wow_count', 'wow_count_sh');
	endif;
	
	
	/*
	==========================================================
	Toggle [wow_toggle title="Your title or question"]Your content or answer[/wow_toggle]
	==========================================================
	*/
	
	if( !function_exists('wow_toggle_shortcode') ) {
		function wow_toggle_shortcode( $atts, $content = null ) {
			extract( shortcode_atts( array( 'title' => 'Toggle Title' ), $atts ) );
			return '<div class="clearfix"></div><div class="clearfix wow-toggle"><h3 class="wow-toggle-trigger">'. $title .'</h3><div class="wow-toggle-container">' . do_shortcode($content) . '</div></div>';
		}
		add_shortcode('wow_toggle', 'wow_toggle_shortcode');
	}
	
	if( !function_exists('wow_toggle_noshortcode') ) {
		function wow_toggle_noshortcode( $atts, $content = null ) {
			extract( shortcode_atts( array( 'title' => 'Toggle Title' ), $atts ) );
			return '<div class="clearfix"></div><div class="clearfix wow-toggle nosh" style="margin-bottom:20px;"><h3 class="wow-toggle-trigger" style="margin-top:0px;">'. $title .'</h3><div class="wow-toggle-container">' . $content. '</div></div>';
		}
		add_shortcode('wow_toggle_nosh', 'wow_toggle_noshortcode');
	}	
	
	
	/*
	==========================================================
	BS PACK (Accordion, Tables, Tabs)
	==========================================================
	*/

				class BoostrapShortcodes {

					function __construct() {
					add_action( 'init', array( $this, 'add_shortcodes' ) ); 
				}
					function add_shortcodes() {
					add_shortcode('collapsibles', array( $this, 'bs_collapsibles' ));
					add_shortcode('collapse', array( $this, 'bs_collapse' ));
					add_shortcode('table', array( $this, 'bs_table' ));
					add_shortcode('tabs', array( $this, 'bs_tabs' ));
					add_shortcode('tab', array( $this, 'bs_tab' ));
				}

			  
				/*--------------------------------------------------------------------------------------    *
				* Accordion
				
				[collapsibles]
				[collapse title="Collapse 1" state="active"]…[/collapse]
				[collapse title="Copllapse 2"]…[/collapse]
				[collapse title="Copllapse 3"]…[/collapse]
				[/collapsibles]
				*-------------------------------------------------------------------------------------*/
				function bs_collapsibles( $atts, $content = null ) {
					
					if( isset($GLOBALS['collapsibles_count']) )
					  $GLOBALS['collapsibles_count']++;
					else
					  $GLOBALS['collapsibles_count'] = 0;

					$defaults = array();
					extract( shortcode_atts( $defaults, $atts ) );
					
					// Extract the tab titles for use in the tab widget.
					preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
					
					$tab_titles = array();
					if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
					
					$output = '';
					
					if( count($tab_titles) ){
					  $output .= '<div class="panel-group" id="accordion-' . $GLOBALS['collapsibles_count'] . '">';
					  $output .= do_shortcode( $content );
					  $output .= '</div>';
					} else {
					  $output .= do_shortcode( $content );
					}
					
					return $output;
				  }
			  
				function bs_collapse( $atts, $content = null ) {

					if( !isset($GLOBALS['current_collapse']) )
					  $GLOBALS['current_collapse'] = 0;
					else 
					  $GLOBALS['current_collapse']++;


					$defaults = array( 'title' => 'Tab', 'state' => '', 'collapsed' => '' );
					extract( shortcode_atts( $defaults, $atts ) );
					
					if (!empty($state)) { 
					  $state = 'in';
					  } else {	
					  $collapsed = 'collapsed';}

					return '
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class=" ' . $collapsed . '">
						  ' . $title . ' 
						</a>
						</h4>
					  </div>
					  <div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="panel-collapse collapse ' . $state . '">
						<div class="panel-body">
						  ' . $content . ' 
						</div>
					  </div>
					</div>
					';
				  }
			  
				/*--------------------------------------------------------------------------------------
				*
				* Table
				* 
				*-------------------------------------------------------------------------------------*/
			  function bs_table( $atts ) {
				extract( shortcode_atts( array(
					  'cols' => 'none',
					  'data' => 'none',
					  'type' => 'type'
				  ), $atts ) );
						$cols = explode(',',$cols);
						$data = explode(',',$data);
						$total = count($cols);
						$output = '';
						$output .= '<table class="table table-'. $type .' table-bordered"><tr>';
						foreach($cols as $col):
						  $output .= '<th>'.$col.'</th>';
						endforeach;
						$output .= '</tr><tr>';
						$counter = 1;
						foreach($data as $datum):
						  $output .= '<td>'.$datum.'</td>';
						  if($counter%$total==0):
							  $output .= '</tr>';
						  endif;
						  $counter++;
						endforeach;
						  $output .= '</table>';
						return $output;
				}  
			  
				/*--------------------------------------------------------------------------------------
				* Tabs
				*-------------------------------------------------------------------------------------*/
			  function bs_tabs( $atts, $content = null ) {
				
					if( isset($GLOBALS['tabs_count']) )
					  $GLOBALS['tabs_count']++;
					else
					  $GLOBALS['tabs_count'] = 0;
					extract( shortcode_atts( array(
					'tabtype' => 'nav-tabs',
					'tabdirection' => '',
				  ), $atts ) );
				   //DW $defaults = array('tabtype' => 'bla', 'tabdirection' => 'one');
				   //DW extract( shortcode_atts( $defaults, array(), $atts ) );
					
					// Extract the tab titles for use in the tab widget.
					preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
					
					$tab_titles = array();
					if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
					
					$output = '';
					
					if( count($tab_titles) ){
					  $output .= '<div class="tabbable tabs-'.$tabdirection.'"><ul class="nav '. $tabtype .'" id="custom-tabs-'. rand(1, 100) .'">';
					  
					  $i = 0;
					  foreach( $tab_titles as $tab ){
						if($i == 0)
						  $output .= '<li class="active">';
						else
						  $output .= '<li>';

						$output .= '<a href="#custom-tab-' . $GLOBALS['tabs_count'] . '-' . sanitize_title( $tab[0] ) . '"  data-toggle="tab">' . $tab[0] . '</a></li>';
						$i++;
					  }
						
						$output .= '</ul>';
						$output .= '<div class="tab-content">';
						$output .= do_shortcode( $content );
						$output .= '</div></div>';
					} else {
					  $output .= do_shortcode( $content );
					}
					
					return $output;
				  }

			  function bs_tab( $atts, $content = null ) {

					if( !isset($GLOBALS['current_tabs']) ) {
					  $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
					  $state = 'active';
					} else {

					  if( $GLOBALS['current_tabs'] == $GLOBALS['tabs_count'] ) {
						$state = ''; 
					  } else {
						$GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
						$state = 'active';
					  }
					}

					$defaults = array( 'title' => 'Tab');
					extract( shortcode_atts( $defaults, $atts ) );
				
					return '<div id="custom-tab-' . $GLOBALS['tabs_count'] . '-'. sanitize_title( $title ) .'" class="tab-pane ' . $state . '">'. do_shortcode( $content ) .'</div>';
					}
				}

				new BoostrapShortcodes();
	
	
	/*
	==========================================================
	Progress Bar
	
	[wow_skills]
	[skill width="100%" icon="legal" text="Legal Issues"]
	[skill width="100%" icon="legal" text="Legal Issues"]
	[/wow_skills]
	==========================================================
	*/	
	
	if( !function_exists('wow_skills_shortcode') ) {
		function wow_skills_shortcode( $atts, $content = null  ) {
			 extract( shortcode_atts( array(
				'icon' => '',
				'actiontext' => '',
				'link' => ''
			), $atts ) );			
			return '<ul id="skill">' . do_shortcode($content) . '</ul>';
		}		
		add_shortcode( 'wow_skills', 'wow_skills_shortcode' );
	}

	if( !function_exists('skill_shortcode') ) {
		function skill_shortcode( $atts, $content = null  ) {
			 extract( shortcode_atts( array(
				'icon' => '',
				'text' => '',
				'width' => ''
			), $atts ) );			
			return '<li><span class="thebar progressdefault" style="width:' . $width . ';"></span><h3 class="fontregular"><i class="fa fa-' . $icon . '"></i> ' . $text . '</h3></li>';
		}		
		add_shortcode( 'skill', 'skill_shortcode' );
	}
	
		/*
	==========================================================
	Team
	
	[wow_teambox name="Emma" position="Manager" description="text here" imglink="#"] 
	[wow_social icon="facebook" link="#"] 
	[wow_social icon="twitter" link="#"] 
	[wow_social icon="linkedin" link="#"] 
	[wow_social icon="google-plus" link="#"] 
	[wow_social icon="pinterest" link="#"] 
	[/wow_teambox]
	==========================================================
	*/
	
	// MainPart Shortcode
	if( !function_exists('wow_teambox_shortcode') ) {
		function wow_teambox_shortcode( $atts, $content = null  ) {		
			extract( shortcode_atts( array(
				'name' => '',
				'position' => '',
				'description' => '',
				'imglink' => ''			
			), $atts ) );			
			return '<div class="thumbnail"><img src="' . $imglink . '" alt=""><div class="caption"><h4>' . $name . '</h4><span class="fontitalic">' . $position . '</span><p>' . $description . '<br></p><ul class="social-icons">' . do_shortcode($content) . '</ul></div></div>';
		}		
		add_shortcode( 'wow_teambox', 'wow_teambox_shortcode' );
	}

	// SecondPart Shortcode
	if( !function_exists('wow_social_shortcode') ) {
		function wow_social_shortcode( $atts, $content = null  ) {
			 extract( shortcode_atts( array(
				'icon' => '',
				'link' => ''			
			), $atts ) );			
			return '<li><a href="' . $link . '"><i class="fa fa-' . $icon . '"></i></a></li>';
		}		
		add_shortcode( 'wow_social', 'wow_social_shortcode' );
	}
	
		/*
	==========================================================
	Pricing
	
	[wow_pricing_table size="col-md-4"]
	[wow_pricing plan="Gold" cost="$29.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow" featured="yes"]
	<ul>
		<li>5 products</li>
		<li>1 image per product</li>
		<li>basic stats</li>
		<li>non commercial</li>
	</ul>
	[/wow_pricing]
	[/wow_pricing_table]
	==========================================================
	*/
	 
	/*main*/
	if( !function_exists('wow_pricing_table_shortcode') ) {
		function wow_pricing_table_shortcode( $atts, $content = null  ) {
		   extract( shortcode_atts( array(
				'size' => 'c4'
			), $atts ) );
		   return '<div class="wow-pricing-table '. $size .'">' . do_shortcode($content) . '</div>';
		}
		add_shortcode( 'wow_pricing_table', 'wow_pricing_table_shortcode' );
	}

	/*section*/
	if( !function_exists('wow_pricing_shortcode') ) {
		function wow_pricing_shortcode( $atts, $content = null  ) {
			
			extract( shortcode_atts( array(
				'position' => '',
				'featured' => 'no',
				'plan' => 'Basic',
				'cost' => '$20',
				'per' => 'month',
				'button_url' => '#',
				'button_text' => 'Purchase',			
				'button_target' => 'self',
				'button_rel' => 'nofollow'			
			), $atts ) );
			
			//set variables
			$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
					
			//start content  
			$pricing_content ='';
			$pricing_content .= '<div class="wow-pricing '. $featured_pricing .' wow-column-'. $position. '">';
				$pricing_content .= '<div class="wow-pricing-header">';
					$pricing_content .= '<h5>'. $plan. '</h5>';
					$pricing_content .= '<div class="wow-pricing-cost">'. $cost .'</div><div class="wow-pricing-per">'. $per .'</div>';
				$pricing_content .= '</div>';
				$pricing_content .= '<div class="wow-pricing-content">';
					$pricing_content .= ''. $content. '';
				$pricing_content .= '</div>';
				if( $button_text ) {
					$pricing_content .= '<div class="wow-pricing-button"><a href="'. $button_url .'" class="wow-button buttonprice" target="_'. $button_target .'" rel="'. $button_rel .'"><span class="wow-button-inner">'. $button_text .'</span></a></div>';
				}
			$pricing_content .= '</div>';  
			return $pricing_content;
		}
		
		add_shortcode( 'wow_pricing', 'wow_pricing_shortcode' );
	}
	

/*=================================
CHAPTER 4. SECTIONS

- You Tube Vid
- Vimeo Vid
- Self Hosted Vid
- Colored Section
- Full Width Section
- Big Text
===================================*/	
	
	/*
	==========================================================
	You Tube Video [bg_youtube videoid="T2f9Q3OO5H4" loop="1" maxheight="600px" margintop="-30px"]...[/bg_youtube]
	==========================================================
	*/
	
	function the_youtubebg_shortcode($atts,$content = null) {
		extract( shortcode_atts( array( "maxheight" => '', "loop" => '1', "videoid" => '', "margintop" => ''), $atts ) );
		$output = '';
		$output .=  '<div class="videowrap" style="overflow:hidden; max-height:'.$maxheight.'; margin-top:'.$margintop.';"><div class="video-containeryt"><div id="player" class="youtubevideobg"></div></div>';
		$output .= '<div class="videocontent">'.do_shortcode($content).'</div>';
		$output .=  '</div>';
		$output .=  "
		<script>
			  var tag = document.createElement('script');
			  tag.src = 'https://www.youtube.com/iframe_api';
			  var firstScriptTag = document.getElementsByTagName('script')[0];
			  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
			 
			  var player;
			  function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {				 
				  height: '100%',
				  width: '100%',
				  videoId: '".$videoid."',
				  playerVars: { 'autoplay': 1, 'controls': 0, 'rel': 0, 'hd': 1, 'modestbranding': 1, 'loop': ".$loop.", 'showinfo':0, 'autohide': 1, 'disablekb': 1 },
				  events: {
					'onReady': onPlayerReady,
					onStateChange: function(e){
						var id = '".$videoid."';
						if(e.data === YT.PlayerState.ENDED){
							player.loadVideoById(id);
						}
					}					
				  }
				});
			  }			 
				function onPlayerReady(event) {
				event.target.playVideo();
				}
		</script>";
		return $output;
	}
	add_shortcode( 'bg_youtube', 'the_youtubebg_shortcode' );	
		
	
	/*
	==========================================================
	Vimeo Video [bg_vimeo videoid="38578500" loop="1" maxheight=""]...[/bg_vimeo]
	==========================================================
	*/
	
	function the_vimeobg_shortcode($atts,$content = null) {
		extract( shortcode_atts( array( "loop" => '1', "videoid" => '', "maxheight" => '', "margintop" => '', "marginbot" => '',), $atts ) );
		$output = '';
		$output .=  '<div class="videowrap" style="overflow:hidden; max-height:'.$maxheight.'; margin-top:'.$margintop.';"><div class="video-containeryt"><iframe src="//player.vimeo.com/video/'.$videoid.'?&portrait=0&byline=0&title=0&badge=0&autoplay=1&loop='.$loop.'"></iframe></div>';
		$output .= '<div class="videocontent">'.do_shortcode($content).'</div>';
		$output .=  '</div>';
		return $output;
	}
	add_shortcode( 'bg_vimeo', 'the_vimeobg_shortcode' );	
		
	
	/*
	==========================================================
	Self Hosted Video [bg_hostedvideo url="http://easyhtml5video.com/images/happyfit2.webm" width="100% height="" autoplay="true" mute="false" loop="true" controls="false"]
	==========================================================
	*/
	
	function the_bg_hostedvideo($atts,$content = null) {
		extract( shortcode_atts( array( "url" => '', "width" => '100%', "height" => '', "mute" => '', "loop" => '', "autoplay" => '', "controls" => '',), $atts ) );
		
		if($mute == "true"){
				$mute = 'muted="muted"';
				} else {$mute = '';}
				
		if($loop == "true"){
				$loop = 'loop="loop"';
				} else {}
				
		if($autoplay == "true"){
				$autoplay = 'autoplay="autoplay"';
				} else {$autoplay = '';}
		
		if($controls == "true"){
				$controls = 'controls="controls"';
				} else {$controls = '';}
		
		$output = '';
		$output .=  '<div class="videowrapsh"><div class="video-containersh"><video '.$controls.' '.$loop.' '.$mute.' '.$autoplay.' width="'.$width.'" height="'.$height.'"><source src="'.$url.'"></video></div>';
		$output .= '<div class="videocontent">'.do_shortcode($content).'</div>';
		$output .=  '</div>';
		return $output;
	}
	add_shortcode( 'bg_hostedvideo', 'the_bg_hostedvideo' );
	
	
	
	/*
	==========================================================
	Color Areas
	[colorarea bgcolor="#ffd700" textcolor="#fff" margintop="" marginbot="" padding="" align=""]...[/colorarea]
	==========================================================
	*/
	if( !function_exists('wow_colorarea_shortcode') ) {

		function wow_colorarea_shortcode( $atts, $content = null  ) {	
			extract( shortcode_atts( array(
				'bgcolor' => '',
				'align' => '',
				'textcolor' => '',
				'margintop' => '0px',
				'marginbot' => '0px',
				'padding' => '40px',
			  ),
			  $atts ) );
			  
			  return '<div class="clearfix"></div></div></div><div class="colorarea" style="text-align:'.$align.'; padding:'.$padding.'; margin-top:'.$margintop.'; margin-bottom:'.$marginbot.'; background-color:'.$bgcolor.';color:'.$textcolor.';"><div class="container"><div class="row">' . do_shortcode($content) . '</div></div></div><div class="container"><div class="row">';
		}
		add_shortcode( 'colorarea', 'wow_colorarea_shortcode' );
	}

	
	/*
	==========================================================
	End container & begin full width [fullwidth margin="" bgcolor="#333" color=""]
	==========================================================
	*/
	if( !function_exists('wow_startfull_shortcode') ) {
	function wow_startfull_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
				'margin' => '',
				'bgcolor' => '',
				'color' => ''
			), $atts ) );
	
		if(!empty($margin)){
			$margin = '<div style="height:'.$margin .';"></div>';
		}
		
		   return '<div class="clearfix"></div></div></div><div class="fullwdtharea" style="position:relative; background-color:'.$bgcolor .'; color:'.$color .';">'.$margin . do_shortcode($content) .$margin.'</div><div class="container"><div class="row">';
		}
		add_shortcode( 'fullwidth', 'wow_startfull_shortcode' );
	}
	
	/*
	==========================================================
	Big Text Block [wow_block]...[/wow_block]
	==========================================================
	*/
	function the_block_shortcode($atts,$content = null) {
		$output = '';
		$output .=  '<div class="block2 text-center max80">';
		$output .= do_shortcode($content);
		$output .=  '</div>';
		return $output;
	}
	add_shortcode( 'wow_block', 'the_block_shortcode' );
	
	/*
	==========================================================
	Big Text Block 2 [wow_block2]...[/wow_block2]
	==========================================================
	*/
	function the_block2_shortcode($atts,$content = null) {
		$output = '';
		$output .=  '<div class="boldheaderarea text-center max80">';
		$output .= do_shortcode($content);
		$output .=  '</div>';
		return $output;
	}
	add_shortcode( 'wow_block2', 'the_block2_shortcode' );
	
		/*
		==========================================================
		Text Medium [wow_textmedium type="" after="" duration=""]...[/wow_textmedium]
		==========================================================
		*/
		
		function the_textmedium_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "after" => '', "duration" => '', "color" => ''), $atts ) );
			$output = '';
			$output .=  '<h3 style="color:'.$color.';"><div class="text1 wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'">';
			$output .= do_shortcode($content);
			$output .=  '</div></h3>';
			return $output;
		}
		add_shortcode( 'wow_textmedium', 'the_textmedium_shortcode' );
		
		/*
		==========================================================
		Text Big [wow_textbig type="" after="" duration=""]...[/wow_textbig]
		==========================================================
		*/
		
		function the_textbig_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "after" => '', "duration" => '', "color" => ''), $atts ) );
			$output = '';
			$output .=  '<h2 style="color:'.$color.';"><div class="text2 wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'">';
			$output .= do_shortcode($content);
			$output .=  '</div></h2>';
			return $output;
		}
		add_shortcode( 'wow_textbig', 'the_textbig_shortcode' );
		
		
		/*
		==========================================================
		Text Small [wow_textsmall type="" after="" duration=""]...[/wow_textsmall]
		==========================================================
		*/
		
		function the_textsmall_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "after" => '', "duration" => '', "color" => ''), $atts ) );
			$output = '';
			$output .=  '<h4 style="color:'.$color.';"><div class="text3 wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'">';
			$output .= do_shortcode($content);
			$output .=  '</div></h4>';
			return $output;
		}
		add_shortcode( 'wow_textsmall', 'the_textsmall_shortcode' );		


/*=================================
CHAPTER 5. SLIDERS

- Text Slider
- Testimonial Slider
- Carousel Slider
- Big Intro Slider
===================================*/	
	
	/*
	==========================================================
	Text Slider [wow_textslider]...[/wow_textslider]
	==========================================================
	*/

	function the_textslider_shortcode($atts,$content = null) {
		wp_enqueue_script( 'wowcarousel' );
		wp_enqueue_script( 'wowcarouselanything' );
		$output = '';
		$output .=  '<div class="wowcarouselanything owl-carousel">';
		$output .= do_shortcode($content);
		$output .=  '</div>';
		return $output;
	}
	add_shortcode( 'wow_textslider', 'the_textslider_shortcode' );	
		
		/*
		==========================================================
		Text Slide [textslide align=""]...[/textslide]
		==========================================================
		*/
		
		function the_textslide_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "align" => ''), $atts ) );
			$output = '';
			$output .=  '<div class="item text-'.$align.'">';
			$output .= do_shortcode($content);
			$output .=  '</div>';
			return $output;
		}
		add_shortcode( 'textslide', 'the_textslide_shortcode' );	
	
		/*
		==========================================================
		Testimonial Slide [testim img="#" author="..."]...[/testim]
		==========================================================
		*/
		
		function the_testim_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "img" => '',"author" => '' ), $atts ) );
			$output = '';
			$output .=  '<div class="item wowshtestim"><div class="max80 text-center"><img src='.$img.' class="testimimg"><br/>';
			$output .= '<div class="content">'.do_shortcode($content).'</div><div class="author">'.$author.'</div>';
			$output .=  '</div></div>';
			return $output;
		}
		add_shortcode( 'testim', 'the_testim_shortcode' );
		
		/*
		==========================================================
		Client Slider [sclient]...[/sclient]
		==========================================================
		*/
		
		function the_sclient_shortcode($atts,$content = null) {
			wp_enqueue_script( 'wowcarousel' );
			$output = '';
			$output .=  '<div class="item wowshsclient text-center">';
			$output .= '<div class="content">'.do_shortcode($content).'</div>';
			$output .=  '</div>';
			return $output;
		}
		add_shortcode( 'sclient', 'the_sclient_shortcode' );
	
	
	
	/*
	==========================================================
	Flexslider Big Intro [wow_animslider][animtext]...[/animtext] [animtext]...[/animtext][/wow_animslider]
	==========================================================
	*/
	
	function the_animslider_shortcode($atts,$content = null) {
		wp_enqueue_script( 'wowflexslider' );
		$output = '';
		$output .=  '<div class="wowanimslider fullwidth flexslider clearfix"><ul class="slides">';
		$output .= do_shortcode($content);
		$output .=  '</ul></div>';
		return $output;
	}
	add_shortcode( 'wow_animslider', 'the_animslider_shortcode' );
	
		/*
		==========================================================
		Animtext [animtext padding="80px" color="#ffffff" align="center"]...[/animtext]
		==========================================================
		*/
		
		function the_animtext_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "padding" => '', "color" => '', "align" => '' ), $atts ) );
			$output = '';
			$output .=  '<li><div class="caption text-'.$align.'" style="padding-top:'.$padding.';padding-bottom:'.$padding.'; color:'.$color.';">';
			$output .= do_shortcode($content);
			$output .=  '</div></li>';
			return $output;
		}
		add_shortcode( 'animtext', 'the_animtext_shortcode' );
		
		/*
		==========================================================
		Anim Title [animtitle type="zoomIn" after="0s" duration="1s"]...[/animtitle]
		==========================================================
		*/
		
		function the_animtitle_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "after" => '', "duration" => '' ), $atts ) );
			$output = '';
			$output .=  '<h1 class="home-slide-content wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'">';
			$output .= do_shortcode($content);
			$output .=  '</h1>';
			return $output;
		}
		add_shortcode( 'animtitle', 'the_animtitle_shortcode' );
		
		/*
		==========================================================
		Anim Subtitle [animsubtitle type="zoomIn" after="0.9s" duration="2s"]...[/animsubtitle]
		==========================================================
		*/
		function the_animsubtitle_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "after" => '', "duration" => '' ), $atts ) );
			$output = '';
			$output .=  '<h6 class="wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'">';
			$output .= do_shortcode($content);
			$output .=  '</h6>';
			return $output;
		}
		add_shortcode( 'animsubtitle', 'the_animsubtitle_shortcode' );
		
		/*
		==========================================================
		Anim Button [animbutton colored="yes/no" type="rollIn" after="0.9s" duration="1s" icon="" text="" link="#"]
		==========================================================
		*/
		function the_animbutton_shortcode($atts,$content = null) {
			extract( shortcode_atts( array( "type" => '', "after" => '', "duration" => '', "icon" => '', "text" => '', "link" => '', "colored" => '' ), $atts ) );
			if	($colored == "yes"){
				$colored = "color";
				}
			$output = '';
			$output .=  '<a href="'.$link.'" class="btn '.$colored.' wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'"><i class="fa fa-'.$icon.'"></i> '.$text.'</a>';
			return $output;
		}
		add_shortcode( 'animbutton', 'the_animbutton_shortcode' );
	
	
	

/*=================================
CHAPTER 6. BOXES

- Services
- Features
===================================*/		
	
	/*
	==========================================================
	Service 1
	
	[serviceleft icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...content here...[/serviceleft]
	[serviceright icon="cogs" title="Some Title" anim="fadeInRight" after="0.1"]...content here...[/serviceright] 

	or long version

	[col size="6"]
	[serviceleft icon="fire" title="Clean Design" anim="fadeInLeft" after="0.1"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inrem ipsum dolor consect[/serviceleft]
	[serviceleft icon="font" title="Awesome Features" anim="fadeInLeft" after="0.3"]The art and technique of arranging type in order to make language visible. With our build in Font Manager you give your website the final touch.[/serviceleft]
	[serviceleft icon="dashboard" title="Powerful Admin" anim="fadeInLeft" after="0.6"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inrem ipsum dolor consect[/serviceleft]
	[/col]

	[col size="6"]
	[serviceright icon="fire" title="Clean Design" anim="fadeInRight" after="0.1"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inrem ipsum dolor consect[/serviceright]
	[serviceright icon="font" title="Awesome Features" anim="fadeInRight" after="0.3"]The art and technique of arranging type in order to make language visible. With our build in Font Manager you give your website the final touch.[/serviceright]
	[serviceright icon="dashboard" title="Powerful Admin" anim="fadeInRight" after="0.6"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inrem ipsum dolor consect[/serviceright]
	[/col]
	==========================================================
	*/

	// service shortcode right
	add_shortcode('serviceright','serviceright_shortcode');
	function serviceright_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'anim' => '', 'after' => ''),$atts));

		$output = '';
		$output .= '<div class="service-box right-column text-left wow '.$anim.'" data-wow-delay="'.$after.'s">';
		$output .= '<div class="service-box-1 pull-left">';
		$output .= '<span><i class="fa fa-'.$icon.' icon-custom-style"></i></span>';
		$output .= '</div>';
		$output .= '<div class="service-box-2">';
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.$content.'</p>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	// service shortcode left
	add_shortcode('serviceleft','serviceleft_shortcode');
	function serviceleft_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'anim' => '', 'after' => ''),$atts));

		$output = '';
		$output .= '<div class="service-box text-right wow '.$anim.'" data-wow-delay="'.$after.'s">';
		$output .= '<div class="service-box-1 pull-right">';
		$output .= '<span><i class="fa fa-'.$icon.' icon-custom-style"></i></span>';
		$output .= '</div>';
		$output .= '<div class="service-box-2">';
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.$content.'</p>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
	
		/*
	==========================================================
	Service 2 [wow_service2 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...content here...[/wow_service2]]
	==========================================================
	*/
	
	add_shortcode('wow_service2','wow_service2_shortcode');
	function wow_service2_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'anim' => '', 'after' => ''),$atts));
		
		$output  = '<div class="servicestyle2 wow '.$anim.'" data-wow-delay="'.$after.'s">';		
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.do_shortcode($content).'</p>';		
		$output .= '<i class="fa fa-'.$icon.'"></i>';
		$output .= '</div>';

		return $output;
	}
	
	
	/*
	==========================================================
	Service 3 [wow_service3 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...content here...[/wow_service3]
	==========================================================
	*/
	
	add_shortcode('wow_service3','wow_service3_shortcode');
	function wow_service3_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'anim' => '', 'after' => ''),$atts));
		
		$output  = '<div class="servicestyle3 wow '.$anim.'" data-wow-delay="'.$after.'s">';		
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.do_shortcode($content).'</p>';		
		$output .= '<i class="fa fa-'.$icon.'"></i>';
		$output .= '</div>';

		return $output;
	}
	
	
	/*
	==========================================================
	Service 4 [wow_service4 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...content here...[/wow_service4]
	==========================================================
	*/
	
	add_shortcode('wow_service4','wow_service4_shortcode');
	function wow_service4_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'anim' => '', 'after' => ''),$atts));
		
		$output  = '<div class="servicestyle4 wow '.$anim.'" data-wow-delay="'.$after.'s">';		
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.do_shortcode($content).'</p>';
		$output .= '<i class="fa fa-'.$icon.'"></i>';
		$output .= '</div>';

		return $output;
	}
	
	
	/*
	==========================================================
	Service 5 [wow_service5 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...content here...[/wow_service5]
	==========================================================
	*/
	
	add_shortcode('wow_service5','wow_service5_shortcode');
	function wow_service5_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'anim' => '', 'after' => ''),$atts));
		
		$output  = '<div class="servicestyle5 wow '.$anim.'" data-wow-delay="'.$after.'s">';		
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p>'.do_shortcode($content).'</p>';		
		$output .= '<i class="fa fa-'.$icon.'"></i>';
		$output .= '</div>';

		return $output;
	}

	/*
	==========================================================
	Features [wowfeatures icon="fire" title="Some Title" description="Some Description" anim="fadeInLeft" after="0.1"]...content here...[/wowfeatures]
	==========================================================
	*/
	
	add_shortcode('wowfeatures','wowfeatures_shortcode');
	function wowfeatures_shortcode($atts,$content = null)
	{
		extract(shortcode_atts(array( 'icon' => '', 'title' => '', 'description' => '', 'description' => '', 'black' => '', 'blackfill' => '', 'nofill' => '', 'anim' => '', 'after' => ''),$atts));

		if(!empty($nofill)){
					$nofill = 'shortcfeature2';
				}
		if(!empty($black)){
					$black = 'style="color:#444;border:1px solid #666;"';
				}
				
		if(!empty($blackfill)){
					$blackfill = 'style="background-color:#444;"';
				}		
		
		$output = '';
		$output .= '<div class="feature-item '.$nofill.' wow '.$anim.'" data-wow-delay="'.$after.'s">';
		$output .= '<div class="icon" '.$black.' '.$blackfill.'><i class="fa fa-'.$icon.' icon-custom-style"></i></div>';
		$output .= '<h4>'.$title.'</h4>';
		$output .= '<p class="description">'.$description.'</p>';
		$output .= '<span class="sep"></span>';
		$output .= '<p>'.$content.'</p>';
		$output .= '</div>';

		return $output;
	}
	
	
/*=================================
CHAPTER 6. OTHER

- Recent posts
- Recent work
- Contact Form
- Clear Floats
- Spacing
- Before Map
- Google Map
- Private Content
- Twitter
- Animation
===================================*/	

	/*********************************************************************************************
	RECENT PORTFOLIO [wow_recentportfolio]
	*********************************************************************************************/
	function my_recent_portfolio_shortcode($atts){
			wp_enqueue_script('wowrecentfolio');

			wp_enqueue_script('isotopejs');
	   $q = new WP_Query( 
	   array( 'orderby' => 'date', 'posts_per_page' => '8', 'post_type' => 'portfolio', 'ignore_sticky_posts' => 1) 
	 );


	$list = '<div class="recent-portfolio"><div class="text-center smalltitle"></div><div class="list_carousel text-center"><div class="carousel_nav"><a class="prev" id="car_prev" href="#"><span>prev</span></a><a class="next" id="car_next" href="#"><span>next</span></a></div><div class="clearfix"></div> <ul id="recent-portfolio" class="carufred">';

	while($q->have_posts()) : $q->the_post();
	global $post;
	global $post_id;
	$imgurl = wp_get_attachment_url( get_post_thumbnail_id ($post->ID, 'recentprojects-thumb') );

	$list .= '<li><div class="boxcontainer"><a class="imgOpa imgproject" href="' . get_permalink() . '">' . get_the_post_thumbnail ($post->ID, 'recentprojects-thumb') . '</a><div class="roll"><div class="wrapcaption"><a href="' . get_permalink() . '"><i class="fa fa-link captionicons"></i></a>  </div></div><h1><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1></div></li>';

	endwhile;

	wp_reset_query();

	return $list . '</ul></div></div><div class="clearfix"></div>';

	}

	add_shortcode('wow_recentportfolio', 'my_recent_portfolio_shortcode');
	
	/*
	==========================================================
	Recent Posts [wow_recent-posts bloglink="#" invite="Enter Blog" icon="fa-arrow-right"]
	==========================================================
	*/
	
	function the_recent_posts_shortcode( $atts ) {
		extract( shortcode_atts( array( "bloglink" => '',"invite" => '', "icon" => '' ), $atts ) );		
		wp_enqueue_script( 'wowcarousel' );
		wp_enqueue_script( 'wowcarouselblog' );
				
			$output = '';
				
				if ( $bloglink) {
				$output .=  '<div class="text-center"><a href="'.$bloglink.'" class="btn-continue"><i class="wow fadeInLeft fa '.$icon.'"></i> '.$invite.'</a></div>';
				}
		
			$output .=  '<div id="wowrecentposts"  class="owl-carousel">';		
			
				global $post;
				$carouselPosts = new WP_Query();
				$carouselPosts->query(array( 'orderby' => 'date', 'posts_per_page' => '9', 'ignore_sticky_posts' => 1) );
				
				while ($carouselPosts->have_posts()) : $carouselPosts->the_post();			
					$output .=  '<div class="item">';
									if ( has_post_thumbnail() ) {
					$output .=  '<div class="thethumbnail"><a href="' . get_permalink() . '">' . get_the_post_thumbnail ($post->ID) . '</a></div>';
									}
					$output .=  '<div class="textin">
										<a href="' . get_permalink() . '"><h2>' . get_the_title() . '</h2></a>
										<div class="meta clearfix">										
											<span class="time"><i class="fa fa-clock-o"></i>  '.get_the_time('d').'&nbsp;'. get_the_time('M').'&nbsp;'. get_the_time('Y').'</span>										
											<span class="comments"><a href="' . get_permalink() . '"><i class="fa fa-comments"></i>  '.get_comments_number().'</a></span>
										</div>
										<div class="excerpt">' . get_custom_excerpt(150) . '...</div>									
									</div>
								</div>';
				endwhile;
			
			$output .=  '</div>';
			
			return $output;
	
	}
	add_shortcode( 'wow_recent-posts', 'the_recent_posts_shortcode' );
	
	
	/*
	==========================================================
	RECENT WORK [wow_recentwork portfoliolink="#" invite="View All Work" icon="fa-arrow-right"]
	==========================================================
	*/
	
	function my_recentwork_shortcode($atts){		
	wp_enqueue_script('wowisotope');
	$q = new WP_Query(  
	array( 'orderby' => 'date', 'posts_per_page' => '8', 'post_type' => 'portfolio', 'ignore_sticky_posts' => 1) 
	);
	extract( shortcode_atts( array( "portfoliolink" => '',"invite" => '', "icon" => '' ), $atts ) );
	$list = '';
	if ( $portfoliolink) {
	$list = '<div class="text-center clearfix"><a href="'.$portfoliolink.'" class="btn-continue"><i class="fa '.$icon.'"></i> '.$invite.'</a></div>';
	}
	$list .= '<div id="isoposts" class="isoportfolio isorecentwork clearfix">';
	while($q->have_posts()) : $q->the_post();
	global $post;
	global $post_id;
	$imgurl = wp_get_attachment_url( get_post_thumbnail_id ($post->ID, '') );
	
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

	$list .= '<div class="item">
				<div class="pic">
						' . get_the_post_thumbnail ($post->ID, '') . '
						<span class="pic-caption come-left">							
							<p class="portfo-captions">					
								<a href="' . get_permalink() . '"><i class="fa fa-plus link-caption"></i></a>
								<span class="title-caption">'.get_the_title().'</span>
								<span class="taxonomy-caption">'.$tax_links.'</span>
							</p>					
						</span>
				</div>
			 </div>';
	endwhile;
	wp_reset_query();
	return $list.'</div><div class="cleafix"></div>';
	}
	add_shortcode('wow_recentwork', 'my_recentwork_shortcode');	
	
	
	/*
	==========================================================
	Before Map [wow_mapinfo icon="tint"] Delware Street 21[/wow_mapinfo]
	==========================================================
	*/
	
	if ( ! function_exists( 'wow_mapinfo_sh' ) ):
	function wow_mapinfo_sh($atts, $content = null) {

		extract( shortcode_atts( array( 'icon' => 'tint' ), $atts ) );
		return '<div class="wrapbeforemap">
				<div class="mapinfo">' . do_shortcode($content) . '</div>
				<div class="mapinfoicon"><i class="fa fa-' . $icon . '"></i></div>
				</div>';
	}
	add_shortcode('wow_mapinfo', 'wow_mapinfo_sh');
	endif;

	
	/*
	==========================================================
	Map [wow_map lat="42.3314" long="-83.0458" zoom="15" title="Detroit" height="400px"] 
	==========================================================
	*/
	
	function google_simple_marker($params = array()) {
			extract(shortcode_atts(array(
				'lat' => '42.0215229',
				'long' => '-83.2152544',
				'zoom' => 16,
				'height' => '400px',
				'title' => ''
			), $params));
			$map  = "<script type='text/javascript'>// <![CDATA[ \n";
		$map .= "function initialize() { \n";
		$map .= "var myLatlng = new google.maps.LatLng(" . $lat . "," . $long . "); \n";
			$map .= "var mapOptions = { \n";
			$map .= "zoom: ". $zoom . ",\n";
			$map .= "center: myLatlng\n";
			$map .= "}; \n";
			$map .= " var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); \n";
			$map .= " var marker = new google.maps.Marker({ \n";
			$map .= "position: myLatlng,\n";
			$map .= "map: map,"	;
			$map .= "title: '" . $title . "'\n";
			$map .= "});\n";
			$map .= "} \n";
			$map .= "google.maps.event.addDomListener(window, 'load', initialize);\n";
			$map .= "// ]]></script>\n"; 
		$map .= "<div id='map-canvas' style='height:" . $height . ";'></div>";
	 return $map;
	}
	add_shortcode('wow_map', 'google_simple_marker');
	
	/*
	==========================================================
	Contact [wow_contact email=youraddress@email.com]
	==========================================================
	*/
	function mytheme_enqueue_scripts() {
	   // Enque scripts
			wp_enqueue_script('wowplaceholder');
		}
	add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
	$cs_base_dir = get_template_directory_uri(); 

	function pippin_shortcode_contact( $atts, $content = null)	{
	 
		// gives access to the plugin's base directory
		global $cs_base_dir;
	 
		extract( shortcode_atts( array(
		  'email' => get_bloginfo('admin_email')
		  ), $atts ) ); 
	 
		$content .= '
			<script type="text/javascript"> 
				var $j = jQuery.noConflict();
				$j(window).load(function(){				
					$j("#contact-form").submit(function() {
					  // validate and process form here
						var str = $j(this).serialize();					 
						   $j.ajax({
						   type: "POST",
						   url: "' . $cs_base_dir . '/sendmail.php",
						   data: str,
							 success: function(msg){						
								$j("#note").ajaxComplete(function(event, request, settings)
								{ 
									if(msg == "OK") // Message Sent? Show the Thank You message and hide the form
									{
										result = "' . __('Your message has been sent. Thank you.', THEME_LANGUAGE_DOMAIN).'";
										$j("#fields").hide();
									}
									else
									{
										result = msg;
									}								 
									$j(this).html(result);							 
								});					 
							}	
						 });					 
						return false;
					});			
				});
			</script>';
			
			// now we put all of the HTML for the form into a PHP string
			$content .= '<div id="post-a-comment" class="clear">';
				$content .= '<div id="fields">';
					$content .= '<form id="contact-form">';
						$content .= '<input name="to_email" type="hidden" id="to_email" value="' . $email . '"/>';
						$content .= '';
							$content .= '<input name="name" type="text" id="name" class="smoothborder" placeholder="' . __('Name *', THEME_LANGUAGE_DOMAIN).'"/>';
						$content .= '<br/>';
						$content .= '';
							$content .= '<input name="email" type="text" id="email" class="smoothborder" placeholder="' . __('E-mail address *', THEME_LANGUAGE_DOMAIN).'"/>';
						$content .= '<br/>';
						
						$content .= '<textarea rows="6" name="message" class="smoothborder" placeholder="' . __('Message *', THEME_LANGUAGE_DOMAIN).'"></textarea><br/>';
						$content .= '<span class="contacticon"><input type="submit" value="' . __('Send', THEME_LANGUAGE_DOMAIN).'" class="contactbutton" id="contact-submit" /></span>';
					$content .= '</form>';
				$content .= '</div><!--end fields-->';
				$content .= '<br/><div id="note"></div> <!--notification area used by jQuery/Ajax -->';
			$content .= '</div>';
		return $content;
	}
	add_shortcode('wow_contact', 'pippin_shortcode_contact');

	
	/*
	==========================================================
	Clear [wow_clear]
	==========================================================
	*/
	
	if( !function_exists('wow_clear_floats_shortcode') ) {
		function wow_clear_floats_shortcode() {
		   return '<div class="clearfix"></div>';
		}
		add_shortcode( 'wow_clear', 'wow_clear_floats_shortcode' );
	}	
	
		
	/*
	==========================================================
	Private Content [wow_member]This text will be only displayed to registered users.[/wow_member]
	==========================================================
	*/
	
	function wow_member_check_shortcode( $atts, $content = null ) {  
		 if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )  
			 return do_shortcode($content);
		return '';  
	}  
	  
	add_shortcode( 'wow_member', 'wow_member_check_shortcode' );
	
	
	/*
	==========================================================
	Spacing [wow_spacing size="20px"]
	==========================================================
	*/
	
	if( !function_exists('wow_spacing_shortcode') ) {
		function wow_spacing_shortcode( $atts ) {
			extract( shortcode_atts( array(
				'size' => '',
			  ),
			  $atts ) );
		 return '<div style="height: '. $size .'"></div>';
		}
		add_shortcode( 'wow_spacing', 'wow_spacing_shortcode' );
	}
	
	/*
	==========================================================
	Twitter Shortcode [wow_icon type="twitter twittericonsh"][rotatingtweets screen_name='wowthemesnet']
	==========================================================
	*/

	
	
	/*
	==========================================================
	Animation [wow_animation type="bounceIn" after="0.2s" duration=0.5s" style="div/span"]
	==========================================================
	*/
	
	if( !function_exists('wow_animation_shortcode') ) {
		function wow_animation_shortcode( $atts,$content = null ) {
			extract( shortcode_atts( array(
				'type' => '',
				'after' => '',
				'duration' => '',
				'style' => '',
			  ),
			  $atts ) );
		 return '<'. $style .' class="wow '.$type.'" data-wow-delay="'.$after.'" data-wow-duration="'.$duration.'">'.do_shortcode($content).'</'.$style.'>';
		}
		add_shortcode( 'wow_animation', 'wow_animation_shortcode' );
	}
	
	
	
/*=================================
CUSTOM TYPES SHORTCODES

- Slider Wow
- Parallax Wow
===================================*/	

	/*
	==========================================================
	Slider Wow [wslider id=""]
	==========================================================
	*/
	
	add_shortcode('wslider', 'wslider_shortcode_query');
	function wslider_shortcode_query($atts, $content){
	  extract(shortcode_atts(array( // a few default values
	   'posts_per_page' => '1',
	   'post_type' => 'wowslider',
	   'id' => '',
	   'caller_get_posts' => 1)
	   , $atts));
	   
	   $wslider_query = 'posts_per_page='.$posts_per_page.'&post_type='.$post_type.'&id='.$id;

		global $post;
		wp_enqueue_script( 'wowflexslider' );
		$prefix = '_mwow_';
		$entries = get_post_meta( $id, $prefix . 'repeat_group', true );
		
		$posts = new WP_Query($wslider_query);
		$output = '';
		if ($posts->have_posts())
			while ($posts->have_posts()):			
				$posts->the_post();			
				$out = '<div id="post-'.$id.'" class="customtypewowslider fullwidth flexslider clearfix"><ul class="slides">';
				
				foreach ( (array) $entries as $key => $entry ) {
			$img = $title = $titlecolor = $titleanim = $desc = $desccolor = $descanim = $free = $sliderheight = $caption = '';		
			$sliderheight = isset( $entry['sliderheight'] ) ? esc_html( $entry['sliderheight'] ) : '';	

			if ( isset( $entry['title'] ) )
				$title = esc_html( $entry['title'] );
				
			if ( isset( $entry['titlecolor'] ) )
				$titlecolor = do_shortcode( $entry['titlecolor'] );
				
			if ( isset( $entry['desccolor'] ) )
				$desccolor = do_shortcode( $entry['desccolor'] );
				
			 if ( isset( $entry['titleanim'] ) )
				$titleanim = esc_html( $entry['titleanim'] );

			if ( isset( $entry['description'] ) )
				$desc = do_shortcode( $entry['description'] );
				
			if ( isset( $entry['descriptionanim'] ) )
				$descanim = esc_html( $entry['descriptionanim'] );
				
			if ( isset( $entry['freearea'] ) )
				$free = do_shortcode( $entry['freearea'] );

			if ( isset( $entry['image_id'] ) ) {            
				$img = wp_get_attachment_image( $entry['image_id'], 'share-pick', null, array(
					'class' => 'thumb',
				) );
			}

			$caption = isset( $entry['image_caption_margin'] ) ? esc_html( $entry['image_caption_margin'] ) : '';
				
				$out .='<li style="height:'.$sliderheight.';">';
				$out .= $img;
				$out .= '<div class="row"><div class="flex-caption" style="top:'.$caption.';">
						<h3 class="slidertitle wow '.$titleanim.'"><span class="sliderin" style="color:'.$titlecolor.';">'.$title.'</span></h3>
						<h4 class="sliderdescription wow '.$descanim.'"><span class="sliderin" style="color:'.$desccolor.';">'.$desc.'</span></h4>
						<span class="freearea" style="color:'.$desccolor.';">'.$free.'</span>
						</div></div>
						</li>';
						}
					// add here more...
				$out .='</ul></div><div class="clearfix"></div>';
		/* these arguments will be available from inside $content
			get_permalink()  
			get_the_content()
			get_the_category_list(', ')
			get_the_title()
			and custom fields
			get_post_meta($post->ID, 'field_name', true);
		*/
		endwhile;
	  else
		return; // no posts found

	  wp_reset_query();
	  return html_entity_decode($out);
	}
	
	
/*
	==========================================================
	Parallax Wow [wparallax id=""]
	==========================================================
	*/

	add_shortcode('wparallax', 'wparallax_shortcode_query');	
	function wparallax_shortcode_query($atts, $content){
	  extract(shortcode_atts(array( // a few default values
	   'id' => '')
	   , $atts));	   
		
		wp_enqueue_script( 'wowparallax' );	
		global $post;
		$wparallax_query = new WP_Query( array(
			'post_type' => 'wowparallax'
		) );

		if($wparallax_query->have_posts()){
			while ( $wparallax_query->have_posts() ) {
				$wparallax_query->the_post();
				
				$pparallaxheaderimg = get_post_meta( $id, '_mwow_parallaxheaderimg', true );
				$pparallaxheaderheight = get_post_meta( $id, '_mwow_parallaxheaderheight', true );
				$pparallaxheaderbgcolor = get_post_meta( $id, '_mwow_parallaxheaderbgcolor', true );
				$pparallaxheaderopacity = get_post_meta( $id, '_mwow_parallaxheaderopacity', true );
				$pparallaxheaderpattern = get_post_meta( $id, '_mwow_parallaxheaderpattern', true );	
				$pparallaxheadertextcolor = get_post_meta( $id, '_mwow_parallaxheadertextcolor', true );
				$pparallaxtext = get_post_meta( $id, '_mwow_parallaxtext', true );
				$pparallaxpadtop = get_post_meta( $id, '_mwow_parallaxpadtop', true );	
				$pparallaxpadbot = get_post_meta( $id, '_mwow_parallaxpadbot', true );
				
				$out = '';				
				$out .= '<section id="post-'.$id.'" class="parallax parallax-image" style="background-color:'.$pparallaxheaderbgcolor.';';
				
				if (is_array($pparallaxheaderimg)) {
				
				foreach ($pparallaxheaderimg as $attachment_id => $img_full_url) 
						{ 
						$out .= 'background-image:url('.$img_full_url.');';
						}
						
				}
				
				$out .= '">';													
				$out .= '<div class="wrapsection partparallaxarea"';
				
				
				if (is_array($pparallaxheaderpattern)) {
				
				foreach ($pparallaxheaderpattern as $attachment_id => $pattern_img_full_url) 
						{ 
						$out .= 'style="background-image:url('.$pattern_img_full_url.');background-repeat:repeat;"';
						}
				
				}
		
				$out .= '>';				
				$out .= '<div class="overlay" style="background-color:'.$pparallaxheaderbgcolor.'; opacity: '.$pparallaxheaderopacity.';"></div>	
				
				
								<div class="container">
									<div  class="parallax-content" style="padding-top:'. $pparallaxpadtop.';padding-bottom:'. $pparallaxpadbot.';color:'.$pparallaxheadertextcolor.';">		
										<div class="row">
											'.do_shortcode($pparallaxtext).'
										</div>
									</div>
								</div>	
							</div>
				</section>';
				
			}
			
			wp_reset_postdata();
			
		}else {
			echo 'no posts found';
		}
		
	  return html_entity_decode($out);
	}
	
	
?>