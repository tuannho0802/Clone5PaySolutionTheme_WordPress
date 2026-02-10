<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- SEO Meta Tags (Basic fallback if no plugin) -->
    <?php if (!function_exists('wpseo_init')): ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="top-bar">
    <div class="container top-bar-inner">
        <div class="top-bar-left">
            <a href="mailto:sales@5paysolution.com" class="top-link">
            <ul class="pxl-link-list">
                <li>
                    <a href="mailto:sales@5paysolution.com">
                        <i class="fa-regular fa-envelope"></i>
                        <span>sales@5paysolution.com</span>
                    </a>
                </li>
                <li>
                    <a href="https://telegram.me/5pay_support">
                        <i class="fa-brands fa-telegram"></i>
                        <span>Telegram</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <div class="pxl-icon-social">
                <a href="https://youtube.com" target="_blank" aria-label="YouTube">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <div class="site-branding site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="https://5paysolution.com/wp-content/uploads/2024/01/logo-5pay-mbl.png" alt="5Pay Solution" width="109" height="40">
            </a>
        </div><!-- .site-branding -->

        <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>

        <nav id="site-navigation" class="main-navigation">
            <div class="mobile-nav-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="https://5paysolution.com/wp-content/uploads/2024/01/logo-5pay-mbl.png" alt="5Pay Solution" width="109" height="40">
                </a>
            </div>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb' => false,
            ) );
            ?>
            <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
                <ul id="menu-5pay-menu" class="pxl-menu-primary clearfix">
                    <li class="menu-item"><a href="<?php echo home_url('/'); ?>"><span>Home</span></a></li>
                    <li class="menu-item"><a href="/blog"><span>Blog</span></a></li>
                    <li class="menu-item"><a href="/contact"><span>Contact Us</span></a></li>
                </ul>
            <?php endif; ?>
        </nav><!-- #site-navigation -->

        <div class="header-actions">
            <a href="/contact" class="pxl-button btn-header-contact">
                <span class="pxl--btn-text">Contact Us</span>
            </a>
        </div>
    </div>
</header>
