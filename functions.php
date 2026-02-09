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

        // Add support for editor styles.
        add_theme_support('editor-styles');
        // Enqueue editor styles.
        add_editor_style('assets/css/editor-style.css');

        // Add support for core block patterns.
        add_theme_support('core-block-patterns');
    }
endif;
add_action( 'after_setup_theme', 'fivepay_setup' );

/**
 * Register Patterns Manually
 */
function fivepay_register_patterns()
{
    // 1. Register Category
    register_block_pattern_category(
        '5pay-theme',
        array('label' => __('5Pay Theme', 'fivepay'))
    );

    // 2. Register Patterns Manually
    $patterns = array(
        'hero' => array(
            'title' => __('Hero Section', 'fivepay'),
            'slug' => 'fivepay-v5/hero',
            'file' => 'hero.php'
        ),
        'banks' => array(
            'title' => __('Supported Banks Grid', 'fivepay'),
            'slug' => 'fivepay/supported-banks',
            'file' => 'banks.php'
        ),
        'partners' => array(
            'title' => __('Partners Strip', 'fivepay'),
            'slug' => 'fivepay/partners-strip',
            'file' => 'partners.php'
        ),
        'solutions' => array(
            'title' => __('Solutions Zig-Zag', 'fivepay'),
            'slug' => 'fivepay-v5/solutions',
            'file' => 'solutions.php'
        ),
        'why-us' => array(
            'title' => __('Why Us Grid', 'fivepay'),
            'slug' => 'fivepay/why-us-grid',
            'file' => 'why-us.php'
        ),
        'faq' => array(
            'title' => __('FAQ Accordion', 'fivepay'),
            'slug' => 'fivepay/faq-accordion',
            'file' => 'faq.php'
        ),
    );

    foreach ($patterns as $pattern) {
        $content = file_get_contents(get_template_directory() . '/patterns/' . $pattern['file']);

        // Auto-fix: Remove extra whitespaces between block comments and HTML tags to prevent validation errors
        $content = preg_replace('/-->\s+</', '--><', $content);

        register_block_pattern(
            $pattern['slug'],
            array(
                'title' => $pattern['title'],
                'categories' => array('5pay-theme'),
                'content' => $content,
            )
        );
    }
}
add_action('init', 'fivepay_register_patterns');

/**
 * Unregister Old Patterns (Cleanup)
 */
function fivepay_unregister_old_patterns()
{
    $old_slugs = array(
        'fivepay/hero-section',
        'fivepay/solutions-zigzag',
        'fivepay-v1/hero',
        'fivepay-v2/hero',
        'fivepay-v3/hero',
        'fivepay-v4/hero',
        'fivepay-v1/solutions',
        'fivepay-v2/solutions',
        'fivepay-v3/solutions',
        'fivepay-v4/solutions',
        'fivepay-v1/hero-section',
        'fivepay-v2/hero-section',
        'fivepay-v3/hero-section',
        'fivepay-v1/solutions-zigzag',
        'fivepay-v2/solutions-zigzag',
        'fivepay-v3/solutions-zigzag',
    );

    foreach ($old_slugs as $slug) {
        if (WP_Block_Patterns_Registry::get_instance()->is_registered($slug)) {
            unregister_block_pattern($slug);
        }
    }
}
add_action('init', 'fivepay_unregister_old_patterns', 15);

/**
 * Enqueue scripts and styles.
 */
function fivepay_scripts() {
    // Google Fonts - Arimo (Primary) & Inter (Secondary)
    wp_enqueue_style('fivepay-google-fonts', 'https://fonts.googleapis.com/css2?family=Arimo:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap', array(), null);

    // Base Styles
    wp_enqueue_style( 'fivepay-base', get_template_directory_uri() . '/assets/css/base.css', array(), '1.0.0' );
    
    // Layout Styles
    wp_enqueue_style( 'fivepay-layout', get_template_directory_uri() . '/assets/css/layout.css', array('fivepay-base'), '1.0.0' );
    
    // Component Styles
    wp_enqueue_style( 'fivepay-components', get_template_directory_uri() . '/assets/css/components.css', array('fivepay-layout'), '1.0.0' );

    // Main Theme Stylesheet
    wp_enqueue_style( 'fivepay-style', get_stylesheet_uri(), array('fivepay-components'), '1.0.0' );

    // Scripts
    wp_enqueue_script('fivepay-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true);
    wp_enqueue_script('fivepay-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'fivepay_scripts' );

/**
 * Auto-set Static Front Page on Theme Activation
 */
function fivepay_set_static_front_page()
{
    // Use WP_Query to find the page with title 'Home' (get_page_by_title is deprecated)
    $args = array(
        'post_type' => 'page',
        'post_status' => 'all',
        's' => 'Home', // Search for 'Home'
        'posts_per_page' => -1,
        'no_found_rows' => true,
        'ignore_sticky_posts' => true,
        'update_post_term_cache' => false,
        'update_post_meta_cache' => false,
    );

    $query = new WP_Query($args);
    $home_page = null;

    if (!empty($query->posts)) {
        foreach ($query->posts as $post) {
            if ($post->post_title === 'Home') {
                $home_page = $post;
                break;
            }
        }
    }

    if ($home_page) {
        // Set 'show_on_front' to 'page'
        update_option('show_on_front', 'page');

        // Set 'page_on_front' to the ID of the 'Home' page
        update_option('page_on_front', $home_page->ID);

        // Ensure the page uses the correct template
        update_post_meta($home_page->ID, '_wp_page_template', 'template-home.php');
    }
}
add_action('after_switch_theme', 'fivepay_set_static_front_page');

/**
 * Customizer Settings
 */
function fivepay_customize_register($wp_customize)
{
    // Hero Section
    $wp_customize->add_section('fivepay_hero_section', array(
        'title' => __('Hero Section', 'fivepay-clone'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Win BIG with innovative payment processing technology.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'fivepay-clone'),
        'section' => 'fivepay_hero_section',
        'type' => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_desc', array(
        'default' => 'At 5Pay, we pride ourselves on having powerful payment features that enable fast, flexible, and seamless online payment experiences — helping you to maximize business opportunities and accelerate growth with over 90 million transactions recorded globally!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_desc', array(
        'label' => __('Hero Description', 'fivepay-clone'),
        'section' => 'fivepay_hero_section',
        'type' => 'textarea',
    ));

    // Hero Button 1 Text
    $wp_customize->add_setting('hero_btn_1_text', array(
        'default' => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_btn_1_text', array(
        'label' => __('Button 1 Text', 'fivepay-clone'),
        'section' => 'fivepay_hero_section',
        'type' => 'text',
    ));

    // Hero Button 2 Text
    $wp_customize->add_setting('hero_btn_2_text', array(
        'default' => 'About Us',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_btn_2_text', array(
        'label' => __('Button 2 Text', 'fivepay-clone'),
        'section' => 'fivepay_hero_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'fivepay_customize_register');
