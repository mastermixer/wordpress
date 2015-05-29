<?php inc('atom', 'main-start'); ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <?php
        $image = get_field('top_image');

        ?>
        <div class="article-top"
             style="background-image:url('<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>')">

            <header class="article-top-header">
                <div class="inner-container">
                    <h1 class="entry-title"><?php the_title(); ?></h1>

                    <p class="entry-subtitle"><?php the_field('subtitle'); ?></p>
                </div>
            </header>

        </div>

        <div class="inner-container">
            <div class="left-col">
                <div class="entry-intro">
                    <?php the_excerpt(); ?>
                </div>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="right-col">
                <?php inc('molecule', 'entry-meta'); ?>
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

<?php inc('organism', 'explore-oiid'); ?>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

<?php $post_objects = get_field('posts');

if ($post_objects): ?>
    <section class="section">
        <div class="inner-container">
            <div class="section-intro center-text">
                <h2 class="section-title"><?php the_field('connected_title'); ?></h2>

                <ul class="post-list">
                    <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php //setup_postdata($post); ?>

                        <li class="post-list-item">
                            <a href="<?php echo get_the_permalink($post->ID); ?>">
                                <?php echo get_the_post_thumbnail($post->ID, 'portrait-320') ?>
                                <div class="post-list-item-text">
                                    <h3><?php echo $post->post_title ?></h3>
                                    <p>
                                        <?php // this wp function trims text, in this case the excerpt, to the length we set. This is a simple solution for now.
                                        echo wp_trim_words($post->post_excerpt, 8); ?>
                                    </p>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

            </div>
        </div>
    </section>
<?php endif; ?>
