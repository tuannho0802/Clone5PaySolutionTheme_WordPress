<?php
/**
 * Template Name: Contact Us Page
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php
    // Hero Section
    echo do_blocks('<!-- wp:pattern {"slug":"fivepay/contact-hero"} /-->');

    // Contact Info Strip
    echo do_blocks('<!-- wp:pattern {"slug":"fivepay/contact-info"} /-->');

    // Contact Form & Info Section
    echo do_blocks('<!-- wp:pattern {"slug":"fivepay/contact-form"} /-->');

    // Map Section
    echo do_blocks('<!-- wp:pattern {"slug":"fivepay/contact-map"} /-->');
    ?>

</main><!-- #main -->

<?php
get_footer();
