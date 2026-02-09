<?php
/**
 * FivePay Clone functions and definitions
 */

if ( ! function_exists( 'fivepay_setup' ) ) :
    function fivepay_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );

        // Register Menus
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'fivepay-clone' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'fivepay_setup' );

/**
 * Enqueue scripts and styles.
 */
function fivepay_scripts() {
    // Google Fonts - Inter
    wp_enqueue_style( 'fivepay-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null );

    // Base Styles
    wp_enqueue_style( 'fivepay-base', get_template_directory_uri() . '/assets/css/base.css', array(), '1.0.0' );
    
    // Layout Styles
    wp_enqueue_style( 'fivepay-layout', get_template_directory_uri() . '/assets/css/layout.css', array('fivepay-base'), '1.0.0' );
    
    // Component Styles
    wp_enqueue_style( 'fivepay-components', get_template_directory_uri() . '/assets/css/components.css', array('fivepay-layout'), '1.0.0' );

    // Main Theme Stylesheet
    wp_enqueue_style( 'fivepay-style', get_stylesheet_uri(), array('fivepay-components'), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'fivepay_scripts' );
