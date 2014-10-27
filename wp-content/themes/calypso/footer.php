<div id="bottom" class="footer-widget-area">
	<p id="back-top">
		<a href="#top"><span><i class="fa fa-chevron-up"></i></span></a>
	</p>
	<div class="container">
		<div class="row">
		   <?php dynamic_sidebar('bottom'); ?>
		</div>
	</div>
</div>
	
	
 <?php global $bbwoptions; ?>
    <section class="nowidgetbottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                  <?php if(isset($bbwoptions['copyright_text'])) echo $bbwoptions['copyright_text']; ?>
                </div>
				
				<div class="col-sm-8 text-right">
				
				<?php
						if(wp_nav_menu( array( 'theme_location' => 'footerm',							
												'container'  => false,
												'depth'		 => 0,
												'menu_class' => 'footermenu',
												'fallback_cb' => 'false') ))
						{
						echo wp_nav_menu( array( 'sort_column' => 'menu_order', 'container'  => false, 'theme_location' => 'footerm' , 'echo' => '0' ) );
						}
						else
						{

						}
						?>	
                 
                </div>  
            </div>
        </div>
        <a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a><!--#gototop-->
    </section><!--/#footer-->

	

</div>
<?php if(isset($bbwoptions['before_body']))  echo $bbwoptions['before_body']; ?>
<?php if(isset($smof_data['google_analytics'])) echo $smof_data['google_analytics'];?>

    <?php if(isset($smof_data['custom_css'])): ?>
        <?php if(!empty($smof_data['custom_css'])): ?>
            <style>
                <?php echo $smof_data['custom_css']; ?>
            </style>
        <?php endif; ?>
    <?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>