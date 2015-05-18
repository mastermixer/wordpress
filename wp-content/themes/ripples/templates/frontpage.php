<?php
/**
 * Template Name: Frontpage
 */
?>


<div class="page-top">
    <?php
    $frontPageTopImage = get_field('front_page_top_background_image'); ?>
    <picture>
        <source media="(min-width: 64em)"
                src="<?php echo wp_get_attachment_image_src($frontPageTopImage, 'full')[0]; ?>">
        <source media="(min-width: 37.5em)" src="<?php echo wp_get_attachment_image_src($frontPageTopImage)[0]; ?>">
        <source src="<?php echo wp_get_attachment_image_src($frontPageTopImage)[0]; ?>">
        <img src="<?php echo wp_get_attachment_image_src($frontPageTopImage)[0]; ?>"
             alt="This picture loads on non-supporting browsers.">

        <p>Accessible text.</p>
    </picture>
    <?php the_field('front_page_top_title'); ?>
    <?php the_field('front_page_top_text'); ?>
</div>

<div class="flexible-sections">
    <?php

    // check if the flexible content field has rows of data
    if (have_rows('flexible_sections')):

        // loop through the rows of data
        while (have_rows('flexible_sections')) : the_row();

            /****************************************************************************************
             *
             * Video
             *****************************************************************************************/

            if (get_row_layout() == 'video'):?>
                <section class="front-page-section">
                    <div class="inner-container">
                        <div class="center-text">
                            <h2><?php the_sub_field('video_title');?></h2>
                            <?php the_sub_field('video_text');?>
                        </div>
                        <div class="video-container ratio-16-9">
                            <?php the_sub_field('video');?>
                        </div>
                    </div>
                </section>
            <?php
            /****************************************************************************************
             *
             * What is oiid
             *****************************************************************************************/

            elseif (get_row_layout() == 'what_is_oiid'):?>
                <section class="front-page-section">
                    <div class="inner-container">
                        <div class="center-text">
                            <h2><?php the_sub_field('what_is_title');?></h2>
                            <?php the_sub_field('what_is_text');?>
                        </div>
                        <?php if (have_rows('item')): ?>
                            <?php while (have_rows('item')): the_row();

                                // vars
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                $image = get_sub_field('image');

                                ?>
                                <div class="what-is-item clearfix">
                                    <div class="what-is-text">
                                        <h3><?php echo $title; ?></h3>
                                        <?php echo $text; ?>
                                    </div>
                                    <div class="what-is-image">
                                        <?php echo wp_get_attachment_image($image); ?>
                                    </div>
                                </div>


                            <?php endwhile; ?>

                        <?php endif;?>
                    </div>
                </section>
            <?php
            /****************************************************************************************
             *
             * Try it now
             *****************************************************************************************/

            elseif (get_row_layout() == 'try_it_now'):?>
                <section class="front-page-section">
                    <div class="inner-container">
                        <div class="center-text">
                            <h2><?php the_sub_field('title');?></h2>
                            <?php the_sub_field('text');?>
                        </div>
                        <?php if (have_rows('share_buttons')): ?>
                            <div class="share-buttons">
                                <?php while (have_rows('share_buttons')): the_row(); ?>
                                    <?php $buttonImage = get_sub_field('button_image'); ?>
                                    <a href="<?php the_sub_field('url'); ?>">
                                        <?php echo wp_get_attachment_image($buttonImage); ?>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;?>
                    </div>
                </section>

            <?php

            /****************************************************************************************
             *
             * Connected articles
             *****************************************************************************************/

            elseif (get_row_layout() == 'connected_articles'):?>
                <section class="front-page-section">
                    <div class="inner-container">
                        <div class="center-text">
                            <h2><?php the_sub_field('connected_title');?></h2>
                            <?php the_sub_field('connected_text');?>
                        </div>
                        <?php $post_objects = get_sub_field('posts');

                        if ($post_objects): ?>
                            <ul class="post-list">
                                <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                            <?php the_post_thumbnail() ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif;?>
                    </div>
                </section>

            <?php endif;

        endwhile;

    else :

        // no layouts found

    endif;

    ?>


</div>
