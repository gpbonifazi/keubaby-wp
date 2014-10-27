<?php
header('Content-type: text/css');
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);
global $bbwoptions;

if($smof_data['g_select'] != '0') { ?>
	body {
		font-family: "<?php echo $bbwoptions['g_select']; ?>";
	}
<?php } 

if($smof_data['body_font_style'] != '0') { ?>
	body {
		color: <?php echo $bbwoptions['body_font_style']['color']; ?>; 
		font-weight:<?php echo $bbwoptions['body_font_style']['style']; ?>;
		font-size: <?php echo $bbwoptions['body_font_style']['size']; ?>;
	}
<?php }


if (isset($bbwoptions['logo_image']))
	{
		if(!empty($bbwoptions['logo_image'])){ ?>
			.navbar-default .navbar-brand, .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {font-size:0px;}
		<?php }
	}


if($smof_data['switch_fixedheader'] == '0') { ?>
#page {margin-top:0;}
.toparea {margin-bottom:-10px;}
.navbar-fixed-top, .navbar-fixed-bottom {position: relative;}
.admin-bar .navbar-fixed-top {top: 10px;}
.navbar {margin-bottom:10px;}
.navbar-fixed-top {top: 10px;}
<?php }

if($bbwoptions['select_portfoliocolumnsoptions'] == "1") { ?>
.templateportfoliophp .isoportfolio .item {width:100%;}
<?php }

if($bbwoptions['select_portfoliocolumnsoptions'] == "2") { ?>
.templateportfoliophp .isoportfolio .item {width:50%;}
<?php }

if($bbwoptions['select_portfoliocolumnsoptions'] == "4") { ?>
.templateportfoliophp .isoportfolio .item {width:25%;}
<?php }


if($bbwoptions['skincolor_own']){ ?>
.footer-widget-area h3.widget_title::first-letter, .landingpage-button, .landingpage-button span, .landingpage-button strong, .landingpage-button i, .btn-minimal:hover, a:hover, .button.default, .stresscolor, .pretty-caption:hover,.link-caption:hover, .feature-item.shortcfeature2 .icon, .servicestyle5 i, .colortext 
{color:<?php echo $bbwoptions['skincolor_own']; ?>;}
	
.button,input[type=submit], .stressbg, .pagination .current, .tagcloud a, #respond input[type=submit], #back-top a:hover span, .wow-pricing-table>div.featured .wow-pricing-header, .featured .wow-pricing-per,.featured .wow-pricing-cost,.featured .wow-pricing-button .wow-button,.buttoncolor, .mapinfo, .servicestyle4 i, .feature-item .icon, .wowanimslider .btn.color, .block1 .btn.color, .progress .bar, .nav-tabs>li.active>a,.nav-tabs>li.active>a:hover, .panel-title>a, .panel-title>a.collapsed:hover, #skill i, .pageheaderpagephp .overlay, .nowidgetbottom, .navbar-nav>li.active>a,.navbar-nav>li.active>a:hover,.navbar-nav>li.active>a:focus,.navbar-nav>li>a:hover,.navbar-nav>li>a:focus,.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus,.extra-nav-class a.dropdown-toggle,.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:hover,.navbar-default .navbar-nav>.open>a:focus,.nav .open>a,.nav .open>a:hover,.nav .open>a:focus,.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus ,#waccordion div h4:before, #waccordion div.active h4:before,.cbp_tmtimeline>li .cbp_tmicon,.flex-caption .btn.color,.nav-tabs>li.active>a,.nav-tabs>li.active>a:hover,.buttoncolor,.woocommerce #content input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce-page #content input.button.alt,.woocommerce-page #respond input#submit.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt,.wrapbtncta, .btn-primary 
{background-color:<?php echo $bbwoptions['skincolor_own']; ?>;}

.light-bg .funfacts .icon, .feature-item.shortcfeature2 .icon, .wowanimslider .btn.color, .block1 .btn.color, .flex-caption .btn.color, .nav-tabs>li.active>a,.nav-tabs>li.active>a:hover, .woocommerce #content input.button.alt,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce-page #content input.button.alt,.woocommerce-page #respond input#submit.alt,.woocommerce-page a.button.alt,.woocommerce-page button.button.alt,.woocommerce-page input.button.alt 
{border-color:<?php echo $bbwoptions['skincolor_own']; ?>;}

.navbar-nav>li.active>a:before,.navbar-nav>li>a:hover:before,.navbar-nav>li>a:focus:before,.extra-nav-class a.dropdown-toggle:before 
{border-bottom:6px solid <?php echo $bbwoptions['skincolor_own']; ?>;}
<?php }

print($smof_data['custom_css'])

?>