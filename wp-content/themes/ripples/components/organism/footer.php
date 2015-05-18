<?php use MW\Ripples\Nav; ?>

	<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<div class="inner-container">
			<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="<?php _e( 'To the frontpage', 'ripples' ); ?>" /></a>

		<nav id="footer-navigation" class="navigation" class="footer-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php
			if (has_nav_menu('footer_menu')) :
				wp_nav_menu(['theme_location' => 'footer_menu', 'walker' => new Nav\SageNavWalker(), 'menu_class' => 'footer-menu']);
			endif;
			?>
		</nav>

		</div>
	</footer>