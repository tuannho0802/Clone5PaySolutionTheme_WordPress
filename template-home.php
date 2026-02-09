<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section (Customizer) -->
    <?php
    $hero_title = get_theme_mod('hero_title', 'Win BIG with innovative payment processing technology.');
    $hero_desc = get_theme_mod('hero_desc', 'At 5Pay, we pride ourselves on having powerful payment features that enable fast, flexible, and seamless online payment experiences — helping you to maximize business opportunities and accelerate growth with over 90 million transactions recorded globally!');
    $btn_1_text = get_theme_mod('hero_btn_1_text', 'Contact Us');
    $btn_2_text = get_theme_mod('hero_btn_2_text', 'About Us');
    ?>
    <section class="hero-section slider-container">
        <!-- Slide 1 -->
        <div class="hero-slide active" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg.jpg') center/cover no-repeat;">
            <div class="overlay"></div>
            <div class="container relative z-10">
                <div class="hero-content">
                    <h1 class="hero-title">
                        <?php echo esc_html($hero_title); ?>
                    </h1>
                    <p class="hero-desc">
                        <?php echo esc_html($hero_desc); ?>
                    </p>
                    <div class="hero-actions">
                        <a href="#" class="btn btn-primary"><?php echo esc_html($btn_1_text); ?></a>
                        <a href="#" class="btn btn-white-outline"><?php echo esc_html($btn_2_text); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2 (Static Example) -->
        <div class="hero-slide" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg-2.jpg') center/cover no-repeat;">
            <div class="overlay"></div>
            <div class="container relative z-10">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Seamless Global Payments for Your Business.
                    </h1>
                    <p class="hero-desc">
                        We are a member of FinCEN and specialize in accepting payments, payouts, and settlements using both Fiat
                        and Crypto currencies.
                    </p>
                    <div class="hero-actions">
                        <a href="#" class="btn btn-primary">Get Started</a>
                        <a href="#" class="btn btn-white-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slider Controls -->
        <div class="slider-dots">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

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
