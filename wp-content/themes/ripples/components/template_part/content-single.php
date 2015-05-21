<?php inc('atom', 'main-start'); ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <div class="inner-container">
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php inc('molecule', 'entry-meta'); ?>
            </header>

            <div class="left-col">
                <div class="entry-intro">
                    <?php the_excerpt(); ?>
                </div>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="right-col">
                <?php if (have_rows('images')): ?>

                    <?php while (have_rows('images')): the_row();
                        // vars
                        $image = get_sub_field('image');
                        $text = get_sub_field('text', false, false);
                        ?>
                        <figure class="figure-with-caption">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                            <?php if ($text != ''): ?>
                                <figcaption class="figure-caption"><?php echo $text; ?></figcaption>
                            <?php endif; ?>
                        </figure>
                    <?php endwhile; ?>

                <?php endif; ?>
            </div>

            <footer>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ripples'), 'after' => '</p></nav>']); ?>
            </footer>
        </div>
    </article>
<?php endwhile; ?>
<?php inc('atom', 'main-end'); ?>
