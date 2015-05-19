<?php
/**
 * Template Name: Contact us
 */
?>

<div class="page-top">
    <div class="page-top-wrapper">
        <div class="page-top-inside">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>


<?php inc('atom', 'main-start'); ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <div class="contact-us-text">
            <div class="inner-container">
    
                <h2><?php the_field('subtitle') ?></h2>
    
    
                <div class="text">
                    <?php the_field('text') ?>
                </div>
            </div>
        </div>
    
        <div class="contact-form">
            <div class="inner-container">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="contact-us-text">
            <div class="inner-container">
    
                <h2><?php the_field('subtitle') ?></h2>
    
    
                <div class="text">
                    <?php the_field('text') ?>
                </div>
            </div>
        </div>



    </article>
<?php endwhile; ?>
<?php inc('atom', 'main-end'); ?>
