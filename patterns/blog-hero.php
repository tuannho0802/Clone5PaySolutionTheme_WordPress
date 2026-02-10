<?php
/**
 * Title: Blog Hero
 * Slug: fivepay/blog-hero
 * Categories: 5pay-blog
 * Keywords: blog, hero, title
 */
?>
<!-- wp:group {"className":"blog-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group blog-hero">
    <!-- wp:cover {"url":"https://5paysolution.com/wp-content/uploads/2025/09/banner-blog.jpg","dimRatio":50,"overlayColor":"black","minHeight":300,"minHeightUnit":"px","contentPosition":"center center","align":"full"} -->
    <div class="wp-block-cover alignfull has-black-background-color has-background-dim" style="min-height:300px">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim-50 wp-block-cover__gradient-background has-background-dim"></span>
        <img class="wp-block-cover__image-background" alt="" src="https://5paysolution.com/wp-content/uploads/2025/09/banner-blog.jpg" data-object-fit="cover"/>
        
        <!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","fontSize":"48px"}},"textColor":"white"} -->
            <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color" style="font-size:48px;text-transform:uppercase">Blog</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"align":"center","className":"blog-breadcrumb"} -->
            <p class="has-text-align-center blog-breadcrumb"><a href="/">Home</a> &gt; Blog</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->
