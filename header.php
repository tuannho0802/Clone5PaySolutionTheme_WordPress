<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container header-container">
        <div class="site-branding site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                5PAY <span style="color:var(--color-secondary);">.</span>
            </a>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false, // Do not show pages if no menu is assigned
            ) );
            ?>
            <!-- Fallback for static demo if no menu assigned -->
            <?php if ( ! has_nav_menu( 'primary' ) ) : ?>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Solutions</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Company</a></li>
                    <li><a href="#" class="btn btn-primary" style="padding: 8px 20px; font-size: 14px; color: white;">Get Started</a></li>
                </ul>
            <?php endif; ?>
        </nav><!-- #site-navigation -->
    </div>
</header>
