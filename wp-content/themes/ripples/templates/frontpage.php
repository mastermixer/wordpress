<?php
/**
 * Template Name: Frontpage
 */
?>


<section>
    <?php
    $frontPageTopImage = get_field('front_page_top_background_image');?>
    <picture>
        <source media="(min-width: 64em)" src="<?php echo wp_get_attachment_image_src($frontPageTopImage, 'full')[0];?>">
        <source media="(min-width: 37.5em)" src="<?php echo wp_get_attachment_image_src($frontPageTopImage)[0];?>">
        <source src="<?php echo wp_get_attachment_image_src($frontPageTopImage)[0];?>">
        <img src="<?php echo wp_get_attachment_image_src($frontPageTopImage)[0];?>" alt="This picture loads on non-supporting browsers.">
        <p>Accessible text.</p>
    </picture>
    <?php the_field('front_page_top_title');?>
    <?php the_field('front_page_top_text');?>
</section>


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
                <h2><?php the_sub_field('video_title');?></h2>
                <?php the_sub_field('video_text');?>
                <div class="embed-container">
                    <?php the_sub_field('video');?>
                </div>
            </section>
        <?php
        /****************************************************************************************
         *
         * What is oiid
         *****************************************************************************************/

        elseif (get_row_layout() == 'what_is_oiid'):
            if (have_rows('item')):?>
                <section class="front-page-section">
                    <?php while (have_rows('item')): the_row();

                        // vars
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');

                        ?>
                        <div>
                            <h2><?php echo $title; ?></h2>
                            <?php echo $text; ?>
                        </div>
                        <div>
                            <?php echo wp_get_attachment_image($image); ?>
                        </div>

                        <?php echo $content; ?>


                    <?php endwhile; ?>
                </section>
            <?php endif;
        /****************************************************************************************
         *
         * Try it now
         *****************************************************************************************/

        elseif (get_row_layout() == 'try_it_now'):?>
            <section class="front-page-section">
                <h2><?php the_sub_field('title');?></h2>
                <?php the_sub_field('text');?>
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
            </section>

        <?php

        /****************************************************************************************
         *
         * Connected articles
         *****************************************************************************************/

        elseif (get_row_layout() == 'connected_articles'):?>
            <section class="front-page-section">
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
            </section>

        <?php endif;

    endwhile;

else :

    // no layouts found

endif;

?>

