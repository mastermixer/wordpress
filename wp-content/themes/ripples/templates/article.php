<?php
/**
 * Template Name: Contact us
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
$sharing_email    = sprintf("mailto:?subject=Oiid is fun&body=Tell me more",
    urlencode($sharing_link)
);

?>



<section class="article">
<div class="inner-container">
    <header>
        <h1>Here comes the headline</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam blanditiis nesciunt pariatur cum perspiciatis sint, vero quibusdam! Distinctio quis ab quibusdam, maxime fuga adipisci, assumenda ea iure labore possimus eius.</p>
    </header>
</div>
<div class="inner-container">
    <div class="article-social">
        <ul>
            <li><a href="<?php echo $sharing_facebook; ?>" class="facebook">Facebook</a></li>
            <li><a href="<?php echo $sharing_twitter; ?>" class="twitter">Twitter</a></li>
            <li><a href="<?php echo $sharing_linkedin; ?>" class="linkedin">LinkedIn</a></li>
            <li><a href="<?php echo $sharing_email; ?>" class="email">Epost</a></li>
        </ul>
    </div>
    <div class="article-body">
        <div class="article-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum laboriosam pariatur repellendus, laborum at excepturi vel soluta aliquam esse corrupti animi quaerat nihil tempora sint a perferendis necessitatibus aut voluptatem.</p>
            <p>Voluptas hic inventore, sed incidunt consequuntur, magnam autem expedita cupiditate beatae. Maiores adipisci enim, optio consequatur repellendus deleniti ad perferendis! Aliquam est quos eligendi quis ea hic voluptates iusto quaerat?</p>
            <p>Illum, ex quam laborum labore perspiciatis omnis nam, aliquam fugit, blanditiis velit aliquid? Accusantium aliquid magni, amet praesentium rerum, deleniti esse minus? Quaerat ipsum libero at, mollitia velit aut qui!</p>
            <p>Officiis unde modi corporis, necessitatibus aperiam commodi ex dolorum officia voluptates perspiciatis enim ipsum nostrum et. Cum autem iste, sapiente, nemo, quod ipsa natus a in delectus veniam voluptate ab.</p>
            <p>Consequuntur itaque laudantium minus cumque illo quo, animi, sit voluptas! At odit totam fugit nobis, provident repellat in facilis culpa aut. Quod dolorem excepturi inventore corrupti veniam, natus aliquid ipsam.</p>
        </div>
    </div>
    <aside class="article-sidebar">
        sidebar
    </aside>
</div>
</section>
