<?php inc('atom', 'main-start'); ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php inc('molecule', 'entry-meta'); ?>
            content single
        </header>

        <div class="left-col">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="right-col">

        </div>


        <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'ripples'), 'after' => '</p></nav>']); ?>
        </footer>

    </article>
<?php endwhile; ?>
<?php inc('atom', 'main-end'); ?>
