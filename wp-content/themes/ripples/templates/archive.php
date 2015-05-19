<?php
/**
 * Template Name: Archive
 */
?>

<div class="inner-container">
    <ul class="archive-list">
        <?php
        $args = array(
            'post_type' => array('post')
        );
        $postsQuery = new WP_Query($args);

        while ($postsQuery->have_posts()) : $postsQuery->the_post(); ?>
            <li class="archive-list-item">
                <a href="<?php the_permalink();?>">
                <div class="archive-list-img">
                    <?php the_post_thumbnail('landscape-340'); ?>
                </div>
                <div class="archive-list-text">
                    <h2 class="title"><?php the_title(); ?></h2>
                    <p class="text"><?php echo get_the_excerpt(); ?></p>
                    <p class="published">Publisert: <?php the_time('l, F jS, Y') ?></p>
                </div>
                </a>
            </li>
        <?php endwhile;
        wp_reset_postdata();
        ?>


    </ul>
</div>
