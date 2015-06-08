<?php 
if (is_singular( array( 'post', 'page' ) )) {
    $page_id       = get_queried_object_id();
    $sharing_link  = get_permalink( $page_id);
    $sharing_title = get_the_title( $page_id );
} elseif ( is_front_page() ) {
    $sharing_title = get_bloginfo('name');
    $sharing_link  = site_url();
}

$sharing_facebook = sprintf("http://www.facebook.com/sharer.php?u=%s",
    urlencode($sharing_link)
);
$sharing_twitter  = sprintf("https://twitter.com/share?url=%s&text=%s",
    urlencode($sharing_link),
    urlencode($sharing_title)
);
$sharing_linkedin = sprintf("http://www.linkedin.com/shareArticle?title=%s&url=%s&mini=1",
    urlencode($sharing_title),
    urlencode($sharing_link)
);
$sharing_email    = sprintf("mailto:?subject=Oiid is fun&body=%s",
    urlencode($sharing_link)
);
$sharing_googleplus    = sprintf("https://plus.google.com/share?url=%s",
    urlencode($sharing_link)
);

?>

<div class="share-buttons">


<?php if (is_front_page()) { ?>
    <h3>Share oiid with your friends</h3>
    <ul>
    <?php while (have_rows('social_media_buttons', 'option')): the_row(); 
            $shareLink = get_sub_field('share_link');
            $shareClass = get_sub_field('type'); ?>
            <li>
                <a class="<?php echo $shareClass ?>" href="<?php echo $shareLink ; ?>">
                    <?php echo $shareClass ?>
                </a>
            </li>
    <?php endwhile; ?>
    </ul>

<?php } else { ?>

    <ul>
        <li><a href="<?php echo $sharing_facebook; ?>" class="facebook">Facebook</a></li>
        <li><a href="<?php echo $sharing_twitter; ?>" class="twitter">Twitter</a></li>
        <li><a href="<?php echo $sharing_email; ?>" class="email">Epost</a></li>
        <li><a href="<?php echo $sharing_googleplus; ?>" class="googleplus">Google+</a></li>
    </ul>

<?php } ?>

</div>
