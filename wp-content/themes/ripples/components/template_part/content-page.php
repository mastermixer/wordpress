<div class="inner-container">
    <?php inc('molecule', 'page-header'); ?>
    <?php the_content(); ?>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ripples'), 'after' => '</p></nav>']); ?>
</div>