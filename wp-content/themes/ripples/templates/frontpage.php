<?php
/**
 * Template Name: Frontpage
 */
?>
<style>
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        max-width: 100%;
        height: auto;
    }

    .embed-container iframe,
    .embed-container object,
    .embed-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<?php

// check if the flexible content field has rows of data
if (have_rows('flexible_sections')):

    // loop through the rows of data
    while (have_rows('flexible_sections')) : the_row();

        if (get_row_layout() == 'video'):?>
            <section class="front-page-section">
                <h2><?php the_sub_field('video_title');?></h2>
                <?php the_sub_field('video_text');?>
                <div class="embed-container">
                    <?php the_sub_field('video');?>
                </div>
            </section>
        <?php
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

        elseif (get_row_layout() == 'try_it_now'):?>
            <section class="front-page-section">
                <h2><?php the_sub_field('title');?></h2>
                <?php the_sub_field('text');?>
                <?php  if (have_rows('share_buttons')):?>
                    <?php while (have_rows('share_buttons')): the_row();?>
                        <?php the_sub_field('url');?>
                        <?php the_sub_field('button_image');?>
                    <?php endwhile; ?>
                <?php endif;?>

            </section>

        <?php endif;

    endwhile;

else :

    // no layouts found

endif;

?>

