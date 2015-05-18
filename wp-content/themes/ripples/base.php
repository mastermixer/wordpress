<?php

use MW\Ripples\Config;
use MW\Ripples\Wrapper;

?>

<?php inc('atom', 'head'); ?>
  <body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
    <!--[if lt IE 9]>
	<div class="alert alert-warning">
		<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'ripples'); ?>
	</div>
    <![endif]-->
    <?php inc('organism', 'header'); ?>

		<?php include Wrapper\template_path(); ?>

	    <?php if (Config\display_sidebar()) : ?>
		<aside class="sidebar" role="complementary">
			<?php include Wrapper\sidebar_path(); ?>
		</aside>
		<?php endif; ?>

    <?php
        inc('organism', 'footer');
        wp_footer();
    ?>
  </body>
</html>
