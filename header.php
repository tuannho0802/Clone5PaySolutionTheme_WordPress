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
            <a href="https://telegram.me/MY5PAY" class="top-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                Telegram
            </a>
        </div>
        <div class="top-bar-right">
            <a href="#" class="top-link" aria-label="YouTube">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
            </a>
        </div>
    </div>
</div>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <div class="site-branding site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_demo.png" alt="5Pay Solution" width="131" height="40" style="height: 40px; width: auto;">
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
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            <?php endif; ?>
        </nav><!-- #site-navigation -->

        <div class="header-actions">
            <a href="/contact" class="btn btn-primary btn-sm">Contact Us</a>
        </div>
    </div>
</header>
