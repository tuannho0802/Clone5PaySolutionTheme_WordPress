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

/**
 * Register Block Patterns
 */
function fivepay_register_block_patterns()
{
    // 1. Supported Banks Grid Pattern
    register_block_pattern(
        'fivepay/supported-banks',
        array(
            'title' => __('Supported Banks Grid', 'fivepay-clone'),
            'description' => _x('A grid of supported banks separated by country.', 'Block pattern description', 'fivepay-clone'),
            'categories' => array('featured'),
            'content' => '<!-- wp:group {"className":"fpay-bank-grid-wrapper animate-on-scroll","layout":{"type":"constrained"}} -->
            <div class="wp-block-group fpay-bank-grid-wrapper animate-on-scroll">
                <!-- wp:html -->
                <style>
                    .fpay-bank-grid {
                        display: grid;
                        grid-template-columns: repeat(4, 1fr);
                        gap: 20px;
                        width: 100%;
                    }
                    .fpay-bank-col {
                        background: #fff;
                        border: 1px solid #eee;
                        border-radius: 4px;
                        overflow: hidden;
                    }
                    .fpay-bank-header {
                        padding: 12px;
                        font-weight: 700;
                        text-align: center;
                        color: #fff;
                        text-transform: uppercase;
                        font-size: 14px;
                    }
                    .fpay-bank-header.yellow { background-color: #ffc107; color: #000; }
                    .fpay-bank-header.blue { background-color: #003366; }
                    .fpay-bank-header.red { background-color: #dc3545; }
                    .fpay-bank-header.navy { background-color: #0a192f; }
                    
                    .fpay-bank-list {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }
                    .fpay-bank-list li {
                        padding: 10px 15px;
                        border-bottom: 1px solid #eee;
                        display: flex;
                        align-items: center;
                        font-size: 14px;
                        color: #333;
                        line-height: 1.5;
                    }
                    .fpay-bank-list li:last-child { border-bottom: none; }
                    .fpay-bank-icon {
                        width: 20px;
                        height: 20px;
                        margin-right: 10px;
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                    }
                    @media (max-width: 768px) {
                        .fpay-bank-grid {
                            grid-template-columns: 1fr;
                        }
                    }
                </style>

                <div class="fpay-bank-grid">
                    <!-- VIETNAM -->
                    <div class="fpay-bank-col">
                        <div class="fpay-bank-header yellow">VIETNAM</div>
                        <ul class="fpay-bank-list">
                            <li><span class="fpay-bank-icon">🏦</span> Vietcombank</li>
                            <li><span class="fpay-bank-icon">🏦</span> Techcombank</li>
                            <li><span class="fpay-bank-icon">🏦</span> VietinBank</li>
                            <li><span class="fpay-bank-icon">🏦</span> ACB</li>
                            <li><span class="fpay-bank-icon">🏦</span> BIDV</li>
                            <li><span class="fpay-bank-icon">🏦</span> Sacombank</li>
                            <li><span class="fpay-bank-icon">🏦</span> DongA Bank</li>
                        </ul>
                    </div>

                    <!-- INDONESIA -->
                    <div class="fpay-bank-col">
                        <div class="fpay-bank-header blue">INDONESIA</div>
                        <ul class="fpay-bank-list">
                            <li><span class="fpay-bank-icon">🏦</span> BCA</li>
                            <li><span class="fpay-bank-icon">🏦</span> Mandiri</li>
                            <li><span class="fpay-bank-icon">🏦</span> BNI</li>
                            <li><span class="fpay-bank-icon">🏦</span> BRI</li>
                            <li><span class="fpay-bank-icon">🏦</span> CIMB Niaga</li>
                            <li><span class="fpay-bank-icon">🏦</span> Permata Bank</li>
                        </ul>
                    </div>

                    <!-- MALAYSIA -->
                    <div class="fpay-bank-col">
                        <div class="fpay-bank-header red">MALAYSIA</div>
                        <ul class="fpay-bank-list">
                            <li><span class="fpay-bank-icon">🏦</span> Maybank</li>
                            <li><span class="fpay-bank-icon">🏦</span> CIMB Bank</li>
                            <li><span class="fpay-bank-icon">🏦</span> Public Bank</li>
                            <li><span class="fpay-bank-icon">🏦</span> RHB Bank</li>
                            <li><span class="fpay-bank-icon">🏦</span> Hong Leong Bank</li>
                            <li><span class="fpay-bank-icon">🏦</span> AmBank</li>
                        </ul>
                    </div>

                    <!-- THAILAND -->
                    <div class="fpay-bank-col">
                        <div class="fpay-bank-header navy">THAILAND</div>
                        <ul class="fpay-bank-list">
                            <li><span class="fpay-bank-icon">🏦</span> Kasikornbank</li>
                            <li><span class="fpay-bank-icon">🏦</span> SCB</li>
                            <li><span class="fpay-bank-icon">🏦</span> Bangkok Bank</li>
                            <li><span class="fpay-bank-icon">🏦</span> Krungthai Bank</li>
                            <li><span class="fpay-bank-icon">🏦</span> TMBThanachart</li>
                        </ul>
                    </div>
                </div>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->',
        )
    );

    // 2. Partners Strip Pattern
    register_block_pattern(
        'fivepay/partners-strip',
        array(
            'title' => __('Partners Strip', 'fivepay-clone'),
            'description' => _x('A horizontal strip of partner logos.', 'Block pattern description', 'fivepay-clone'),
            'categories' => array('featured'),
            'content' => '<!-- wp:group {"className":"partner-section"} -->
            <div class="wp-block-group partner-section">
                <div class="container">
                    <div class="partner-strip animate-on-scroll">
                        <!-- Partner Logos -->
                        <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial" font-weight="bold" fill="#333" font-size="20">FinCEN</text></svg>
                        <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial" font-weight="bold" fill="#333" font-size="20">Tether</text></svg>
                        <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial" font-weight="bold" fill="#333" font-size="20">Bitcoin</text></svg>
                        <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial" font-weight="bold" fill="#333" font-size="20">Ethereum</text></svg>
                        <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial" font-weight="bold" fill="#333" font-size="20">Visa</text></svg>
                        <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial" font-weight="bold" fill="#333" font-size="20">Mastercard</text></svg>
                    </div>
                </div>
            </div>
            <!-- /wp:group -->',
        )
    );

    // 3. Solutions Zig-Zag Pattern
    register_block_pattern(
        'fivepay/solutions-zigzag',
        array(
            'title' => __('Solutions Zig-Zag', 'fivepay-clone'),
            'description' => _x('Zig-zag layout for solutions section.', 'Block pattern description', 'fivepay-clone'),
            'categories' => array('featured'),
            'content' => '<!-- wp:group {"className":"section", "style":{"color":{"background":"#ffffff"}}} -->
            <div class="wp-block-group section has-background" style="background-color: var(--color-white);">
                <div class="container">
                    <div class="section-header animate-on-scroll">
                        <h2 class="section-title">Our Solutions</h2>
                        <p class="section-subtitle">Designed to increase conversions and reduce fraud at every step.</p>
                    </div>

                    <!-- Item 1: Image Left, Text Right -->
                    <div class="zigzag-section animate-on-scroll">
                        <div class="zigzag-image">
                            <svg width="600" height="400" viewBox="0 0 600 400" fill="#f0f0f0">
                                <rect width="600" height="400" fill="#e6f7ff"/>
                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="24" fill="#003366">Integrated Full Package UI</text>
                            </svg>
                        </div>
                        <div class="zigzag-content">
                            <h3 style="font-size: 32px; color: var(--color-primary); margin-bottom: 20px;">Integrated Full Package</h3>
                            <p style="color: var(--color-text-light); margin-bottom: 24px; line-height: 1.6;">
                                Get full access to your full-fledge package with receiving accounts. It includes a one-on-one customer service to manage your accounts along with streamlined checkout flows, funds receiving, assets stashing down to optimisation, payout and settlement and more so you can focus on building the next big thing.
                            </p>
                            <ul style="margin-bottom: 30px; color: var(--color-text-light);">
                                <li style="margin-bottom: 10px;">✓ Streamlined checkout flows</li>
                                <li style="margin-bottom: 10px;">✓ Dedicated account management</li>
                                <li>✓ Optimized payout and settlement</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>

                    <!-- Item 2: Text Left, Image Right -->
                    <div class="zigzag-section reverse animate-on-scroll">
                        <div class="zigzag-image">
                            <svg width="600" height="400" viewBox="0 0 600 400" fill="#f0f0f0">
                                <rect width="600" height="400" fill="#fff5f5"/>
                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="24" fill="#dc3545">System Integration UI</text>
                            </svg>
                        </div>
                        <div class="zigzag-content">
                            <h3 style="font-size: 32px; color: var(--color-primary); margin-bottom: 20px;">System Integration Only</h3>
                            <p style="color: var(--color-text-light); margin-bottom: 24px; line-height: 1.6;">
                                Launch and scale embedded payments through our integrated system which is easily setup in minutes, not days. The ease of onboarding gives you the full access to our dashboard with the help from our 5pay experts to assist you whenever you need. Comes in affordable pricing built for businesses for all sizes.
                            </p>
                            <ul style="margin-bottom: 30px; color: var(--color-text-light);">
                                <li style="margin-bottom: 10px;">✓ Setup in minutes, not days</li>
                                <li style="margin-bottom: 10px;">✓ Affordable pricing for all sizes</li>
                                <li>✓ Developer-friendly API</li>
                            </ul>
                            <a href="#" class="btn btn-outline">Read Documentation</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /wp:group -->',
        )
    );

    // 4. Why Us Grid Pattern
    register_block_pattern(
        'fivepay/why-us',
        array(
            'title' => __('Why Us Grid', 'fivepay-clone'),
            'description' => _x('Grid of features/benefits.', 'Block pattern description', 'fivepay-clone'),
            'categories' => array('featured'),
            'content' => '<!-- wp:group {"className":"section", "style":{"color":{"background":"var(--color-light-bg)"}}} -->
            <div class="wp-block-group section" style="background-color: var(--color-light-bg);">
                <div class="container">
                    <div class="section-header animate-on-scroll">
                        <h2 class="section-title">Why Us?</h2>
                        <p class="section-subtitle">5Pay is a complete payment platform, engineered for growth.</p>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                        <!-- Feature 1 -->
                        <div class="feature-item animate-on-scroll">
                            <div style="margin-bottom: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                            <h4 style="color: var(--color-primary); margin-bottom: 10px;">Setup Payment in Minutes</h4>
                            <p style="font-size: 15px; color: var(--color-text-light);">Open account within 1 day with minimum KYC process.</p>
                        </div>
                        <!-- Feature 2 -->
                        <div class="feature-item animate-on-scroll">
                            <div style="margin-bottom: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </div>
                            <h4 style="color: var(--color-primary); margin-bottom: 10px;">Quick Transactions</h4>
                            <p style="font-size: 15px; color: var(--color-text-light);">Payment process is now as fast as 1 min deposit flow and 3 mins deposit confirmation.</p>
                        </div>
                        <!-- Feature 3 -->
                        <div class="feature-item animate-on-scroll">
                            <div style="margin-bottom: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            </div>
                            <h4 style="color: var(--color-primary); margin-bottom: 10px;">Affordable Fees</h4>
                            <p style="font-size: 15px; color: var(--color-text-light);">We offer a world class system with budget friendly prices.</p>
                        </div>
                        <!-- Feature 4 -->
                        <div class="feature-item animate-on-scroll">
                            <div style="margin-bottom: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            </div>
                            <h4 style="color: var(--color-primary); margin-bottom: 10px;">Secure Banking System</h4>
                            <p style="font-size: 15px; color: var(--color-text-light);">Our bank system is integrated with ISO standard to ensure optimum security.</p>
                        </div>
                        <!-- Feature 5 -->
                            <div class="feature-item animate-on-scroll">
                            <div style="margin-bottom: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                            </div>
                            <h4 style="color: var(--color-primary); margin-bottom: 10px;">Comprehensive Security</h4>
                            <p style="font-size: 15px; color: var(--color-text-light);">Our team includes world-class security experts, all focused on strengthening our infrastructure.</p>
                        </div>
                            <!-- Feature 6 -->
                            <div class="feature-item animate-on-scroll">
                            <div style="margin-bottom: 15px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            </div>
                            <h4 style="color: var(--color-primary); margin-bottom: 10px;">24/7 Support</h4>
                            <p style="font-size: 15px; color: var(--color-text-light);">Our tested team is always on the top to serve you whenever you need.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /wp:group -->',
        )
    );

    // 5. FAQ Accordion Pattern
    register_block_pattern(
        'fivepay/faq-accordion',
        array(
            'title' => __('FAQ Accordion', 'fivepay-clone'),
            'description' => _x('Frequently asked questions section.', 'Block pattern description', 'fivepay-clone'),
            'categories' => array('featured'),
            'content' => '<!-- wp:group {"className":"section bg-light"} -->
            <div class="wp-block-group section bg-light">
                <div class="container">
                    <div class="section-header animate-on-scroll">
                        <h2 class="section-title">FAQs</h2>
                        <p class="section-subtitle">Common questions about our services.</p>
                    </div>

                    <div class="faq-container animate-on-scroll">
                        <div class="faq-item">
                            <div class="faq-question">What is 5Pay?</div>
                            <div class="faq-answer">
                                5Pay is Asia’s leading payment service provider with a rich experience in finance, banking and internet technology, all in all focused in providing 24/7 support with ease of integration across.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">How fast is the settlement process?</div>
                            <div class="faq-answer">
                                Payment process is now as fast as 1 min deposit flow and 3 mins deposit confirmation. We offer flexible payout options depending on your region and currency.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">Is the system secure?</div>
                            <div class="faq-answer">
                                Yes, our bank system is integrated with ISO standard to ensure optimum security. Our team includes world-class security experts, all focused on strengthening our infrastructure.
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">How do I integrate 5Pay?</div>
                            <div class="faq-answer">
                                With simple setup, you can easily get your payment up and running in no time. We offer a full range of payment options so you can give customers the experiences they expect.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /wp:group -->',
        )
    );
}
add_action('init', 'fivepay_register_block_patterns');
