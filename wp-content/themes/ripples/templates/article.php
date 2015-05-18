<?php
/**
 * Template Name: Article
 */

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
$sharing_email    = sprintf("http://api.addthis.com/oexchange/0.8/forward/email/offer?note&url=%s",
    urlencode($sharing_link)
);

?>



<section class="article">
<div class="inner-container">
    <div class="article-social">
        <ul>
            <li><a href="<?php echo $sharing_facebook; ?>" class="Facebook">Facebook</a></li>
            <li><a href="<?php echo $sharing_twitter; ?>" class="Twitter">Twitter</a></li>
            <li><a href="<?php echo $sharing_linkedin; ?>" class="Linkedin">LinkedIn</a></li>
            <li><a href="<?php echo $sharing_email; ?>" class="email">Epost</a></li>
        </ul>
    </div>
    <div class="article-text">
        article text
    </div>
    <div class="article-sidebar">
        sidebar
    </div>
</div>
</section>
