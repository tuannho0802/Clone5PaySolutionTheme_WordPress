<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Simple Page Header -->
    <div class="page-header-container" style="background-color: var(--color-light-bg);">
        <div class="container">
            <?php the_title( '<h1 class="entry-title" style="margin-bottom: 0;">', '</h1>' ); ?>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container section" style="padding-top: 40px; padding-bottom: 60px;">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <div class="entry-content" style="background: white; padding: 0;">
                <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fivepay-clone' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
            <?php
        endwhile; // End of the loop.
        ?>
    </div>

</main>

<?php
get_footer();
