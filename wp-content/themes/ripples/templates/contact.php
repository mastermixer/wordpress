<?php
/**
 * Template Name: Contact us
 */
?>

<?php inc('atom', 'main-start'); ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <div class="inner-container">
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <h2><?php the_field('subtitle') ?></h2>
        <div class="text">
            <?php the_field('text') ?>
        </div>

        <div class="contact-form">
            <?php the_content(); ?>
        </div>

        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ripples'), 'after' => '</p></nav>']); ?>
        </footer>
        </div>
    </article>
<?php endwhile; ?>
<?php inc('atom', 'main-end'); ?>
