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
$sharing_email    = sprintf("mailto:?subject=oiid – Step Inside Music – Available in the App store.&body=Hi friend! You should check out oiid - A brand new way of exploring the music you love, layer by layer. Through intuitive app design you can listen to, mute, adjust or pan any instrument in a song. Curious about that bass line? Strip down everything else. Feel like singing along? Hit the lyrics button. Want to learn how to play? Check out the chords.
We hope you’ll enjoy oiid as much as we do. And that you will help us create a new dimension to music.
Learn more at oiid.com and like us on Facebook for more updates. %s",
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
