<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Display Editor Content
    while (have_posts()):
        the_post();
        ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <?php
    endwhile;
    ?>

</main>

<?php
get_footer();
