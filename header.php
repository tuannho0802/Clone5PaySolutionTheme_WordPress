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
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                sales@5paysolution.com
            </a>
            <a href="#" class="top-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                Telegram
            </a>
        </div>
        <div class="top-bar-right">
             <!-- Optional: Youtube or other social icons -->
        </div>
    </div>
</div>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <div class="site-branding site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <svg width="120" height="40" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <text x="0" y="30" font-family="Arial" font-weight="900" font-size="32" fill="#003366">5PAY</text>
                    <circle cx="95" cy="15" r="3" fill="#007bff"/>
                    <circle cx="95" cy="25" r="3" fill="#007bff"/>
                    <circle cx="105" cy="10" r="3" fill="#007bff"/>
                </svg>
            </a>
        </div><!-- .site-branding -->

        <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>

        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb' => false,
            ) );
            ?>
            <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
                <ul>
                    <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="/contact" class="btn btn-primary btn-sm mobile-cta">Contact Us</a></li>
                </ul>
            <?php endif; ?>
        </nav><!-- #site-navigation -->
    </div>
</header>
