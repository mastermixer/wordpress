<?php
/**
 * Template Name: Frontpage
 */
?>

<div class="page-top">
    <?php
    $frontPageBackgroundImage = wp_get_attachment_url(get_field('front_page_top_background_image'));
    $frontPageTopImage = wp_get_attachment_url(get_field('front_page_top_image'));
    $frontPageTopLogo = wp_get_attachment_image(get_field('front_page_top_logo'), 'full'); ?>
    
    <div class="page-top-wrapper" style="background-image: url(<?php echo $frontPageBackgroundImage; ?>); ">
        <div class="page-top-inside" style="background-image: url(<?php echo $frontPageTopImage; ?>); ">
            <?php echo $frontPageTopLogo; ?>
            <h1><?php the_field('front_page_top_title'); ?></h1>
            <?php the_field('front_page_top_text'); ?>
        </div>
    </div>
</div>

<div class="front-page-nav" id="front-page-nav">
    <button class="nav-button">
        Show menu
    </button>
    <div class="nav-mobile-wrapper">
        <!-- Using js to populate this list with links check out frontPageMenu.js. Names are set in WP admin on the front page pr section -->
        <!--TODO: Needs styling and highlighting when active and is in view. Use Waypoints??-->
        <ul class="nav-list"></ul>
        
    </div>
    <div class="app-buttons">

        <?php while (have_rows('download_buttons', 'option')): the_row(); ?>
            <?php $buttonImage = get_sub_field('button_image'); ?>
            <a target="_blank" href="<?php the_sub_field('button_url'); ?>">
                <?php echo wp_get_attachment_image($buttonImage, 'full'); ?>
            </a>
        <?php endwhile; ?>
    </div>
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
                <section class="section" id="video" data-name="<?php the_sub_field('title_for_menu', false, false);?>">
                    <div class="inner-container">
                        <div class="section-intro center-text">
                            <h2 class="section-title"><?php the_sub_field('video_title');?></h2>

                            <p class="section-intro-text"><?php the_sub_field('video_text', false, false);?></p>
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
                <section class="section" id="what" data-name="<?php the_sub_field('title_for_menu', false, false);?>">
                    <div class="inner-container">
                        <div class="section-intro center-text">
                            <h2 class="section-title"><?php the_sub_field('what_is_title');?></h2>

                            <p class="section-intro-text"><?php the_sub_field('what_is_text', false, false);?></p>
                        </div>
                        <?php if (have_rows('item')): ?>
                            <div class="items">
                                <?php while (have_rows('item')): the_row();

                                    // vars
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text', false, false);
                                    $image = get_sub_field('image');

                                    ?>
                                    <div class="what-is-item clearfix">
                                        <div class="what-is-text">
                                            <h3 class="what-is-item-title"><?php echo $title; ?></h3>

                                            <p class="what-is-item-text"><?php echo $text; ?></p>
                                        </div>
                                        <div class="what-is-image">
                                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                                        </div>
                                    </div>


                                <?php endwhile; ?>
                            </div>
                        <?php endif;?>
                    </div>
                </section>
            <?php
            /****************************************************************************************
             *
             * Try it now
             *****************************************************************************************/

            elseif (get_row_layout() == 'try_it_now'):?>
                <section class="section" data-name="<?php the_sub_field('title_for_menu', false, false);?>">
                    <div class="inner-container">
                        <div class="section-intro center-text">
                            <h2 class="section-title"><?php the_sub_field('title');?></h2>

                            <p class="section-intro-text"><?php the_sub_field('text', false, false);?></p>
                        </div>
                        <?php inc('molecule', 'download-buttons'); ?>
                        <?php inc('molecule', 'social-media'); ?>

                    </div>
                </section>

            <?php

            /****************************************************************************************
             *
             * Connected articles
             *****************************************************************************************/

            elseif (get_row_layout() == 'connected_articles'):?>
                <section class="section" data-name="<?php the_sub_field('title_for_menu', false, false);?>">
                    <div class="inner-container">
                        <div class="section-intro center-text">
                            <h2 class="section-title"><?php the_sub_field('connected_title');?></h2>
                            <p class="section-intro-text"><?php the_sub_field('connected_text', false, false);?></p>
                        </div>
                        <?php $post_objects = get_sub_field('posts');

                        if ($post_objects): ?>
                            <ul class="post-list">
                                <?php foreach ($post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                    <?php setup_postdata($post); ?>
                                    <li class="post-list-item">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('portrait-320') ?>
                                            <div class="post-list-item-text">
                                                <h3><?php the_title(); ?></h3>
                                                <?php // the_excerpt(); ?>
                                                <p>
                                                    <?php // this wp function trims text, in this case the excerpt, to the length we set. This is a simple solution for now.
                                                    echo wp_trim_words(get_the_excerpt(), 8); ?>
                                                </p>
                                            </div>
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
