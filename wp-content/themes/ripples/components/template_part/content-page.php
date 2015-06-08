
<?php inc('atom', 'main-start'); ?>
<article class="page-template-page">
	<div class="page-top">
	    <div class="page-top-wrapper">
	        <div class="page-top-inside">
			    <?php inc('molecule', 'page-header'); ?>
	        </div>
	    </div>
	</div>

	<div class="article-main">
	    <div class="inner-container">
	        <div class="left-col">
	            <div class="entry-intro">
	                <?php //the_excerpt(); ?>
	            </div>
	            <div class="entry-content">
	                <?php the_content(); ?>
	            </div>
	        </div>

	        <div class="right-col">
	            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ripples'), 'after' => '</p></nav>']); ?>
	        </div>

	        <?php inc('molecule', 'social-media'); ?>
	    </div>
	</div>
</article>

<?php inc('atom', 'main-end'); ?>
<?php inc('organism', 'explore-oiid'); ?>



