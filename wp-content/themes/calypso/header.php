<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $bbwoptions;
global $smof_data;
?>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php if (isset($bbwoptions['favicon_upload'])) { ?>	
	<link rel="shortcut icon" href="<?php echo $bbwoptions['favicon_upload'];?>">
	<?php } ?>
	
	<?php
		if (isset($bbwoptions['g_select'])) {
		if($bbwoptions['g_select'] && $bbwoptions['g_select'] != '0'): ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo urlencode($bbwoptions['g_select']); ?>:100,200,300,400,400italic,500,600,700,700,800,900italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese' rel='stylesheet' type='text/css' />
		<?php endif; 
		}?>
	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

<div class="toparea">
	<div class="container">
		<div class="row">
			<div class="col-md-6 top-text pull-left wow fadeInLeft">
				<?php if($bbwoptions['topinfos_text'] != '') {  echo $bbwoptions['topinfos_text']; }?>
			</div>
			<div class="col-md-6 text-right wow fadeInRight">
				<?php if($bbwoptions['topsocial_text'] != '') { ?>
					<div class="social-icons">
					<?php echo $bbwoptions['topsocial_text']; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<nav role="navigation" class="navbar navbar-fixed-top wowmenu site-navigation main-navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand logo-nav" href="<?php echo site_url(); ?>">
						<?php
							if (isset($bbwoptions['logo_image']))
							   {
									if(!empty($bbwoptions['logo_image'])){?> 
									<img src="<?php echo $bbwoptions['logo_image']; ?>" alt="">
									<?php
									}
									else
									{
										echo '<div class="textbrnd">'.get_bloginfo('name').'</div>'; 
									}
							   }
							else
							   {
								echo '<div class="textbrnd">'.get_bloginfo('name').'</div>';
							   }
							?>
					</a>
				</div>
				<div class="navbar-collapse pull-right" id="mainMenu">
					<?php if(has_nav_menu('primary')): ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 3, 'container' => false,'menu_class' => 'nav navbar-nav', 'menu_id' => 'navr','walker' => new wp_bootstrap_navwalker()) ); ?>
					<?php endif; ?>
				</div>
			</div>
		</nav><!--/.nav-->
	</header>