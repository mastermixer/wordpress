<?php if (have_rows('store_buttons', 'option')): ?>
    <div class="download-buttons center-text">
        <?php while (have_rows('store_buttons', 'option')): the_row(); ?>
            <?php $buttonImage = get_sub_field('button_image'); ?>
            <a target="_blank" href="<?php the_sub_field('button_url'); ?>">
                <?php echo wp_get_attachment_image($buttonImage, 'full'); ?>
            </a>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
