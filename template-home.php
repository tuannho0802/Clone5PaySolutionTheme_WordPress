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
        <div class="hero-slide active"
            style="background: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg.jpg') center/cover no-repeat;">
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
    // Determine if we should show default content or editor content
    $show_default_content = true;
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $content = get_the_content();
            if (!empty(trim($content))) {
                $show_default_content = false;
            }
        }
        rewind_posts(); // Reset loop
    }

    if (!$show_default_content):
        // Display Editor Content
        while (have_posts()):
            the_post();
            ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
    else:
        // Display Default Hard-coded Sections
        ?>
    <!-- Partners Strip -->
    <section class="partner-section">
        <div class="container">
            <div class="partner-strip animate-on-scroll">
                <!-- Partner Logos -->
                <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial"
                        font-weight="bold" fill="#333" font-size="20">FinCEN</text></svg>
                <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial"
                        font-weight="bold" fill="#333" font-size="20">Tether</text></svg>
                <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial"
                        font-weight="bold" fill="#333" font-size="20">Bitcoin</text></svg>
                <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial"
                        font-weight="bold" fill="#333" font-size="20">Ethereum</text></svg>
                <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial"
                        font-weight="bold" fill="#333" font-size="20">Visa</text></svg>
                <svg height="40" viewBox="0 0 120 40" class="partner-logo"><text x="0" y="25" font-family="Arial"
                        font-weight="bold" fill="#333" font-size="20">Mastercard</text></svg>
            </div>
        </div>
    </section>

        <!-- Zig Zag Layout Section -->
        <section class="section" style="background-color: var(--color-white);">
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
        </section>

        <!-- Why Us Section (Grid) -->
        <section class="section" style="background-color: var(--color-light-bg);">
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
        </section>

        <!-- Supported Banks Section -->
        <section class="section">
            <div class="container">
                <div class="section-header animate-on-scroll">
                    <h2 class="section-title">Supported Banks</h2>
                    <p class="section-subtitle">5Pay: Unlock the value of alternative payment methods</p>
                </div>
                
                <div class="bank-grid-container animate-on-scroll">
                    <!-- Column 1: VIETNAM (Yellow) -->
                    <div class="bank-col">
                        <div class="bank-header yellow">VIETNAM</div>
                        <ul class="bank-list">
                            <li><span style="margin-right:8px;">🏦</span> Vietcombank</li>
                            <li><span style="margin-right:8px;">🏦</span> Techcombank</li>
                            <li><span style="margin-right:8px;">🏦</span> VietinBank</li>
                            <li><span style="margin-right:8px;">🏦</span> ACB</li>
                            <li><span style="margin-right:8px;">🏦</span> BIDV</li>
                            <li><span style="margin-right:8px;">🏦</span> Sacombank</li>
                            <li><span style="margin-right:8px;">🏦</span> DongA Bank</li>
                        </ul>
                    </div>
                    <!-- Column 2: INDONESIA (Blue) -->
                    <div class="bank-col">
                        <div class="bank-header blue">INDONESIA</div>
                        <ul class="bank-list">
                            <li><span style="margin-right:8px;">🏦</span> BCA</li>
                            <li><span style="margin-right:8px;">🏦</span> Mandiri</li>
                            <li><span style="margin-right:8px;">🏦</span> BNI</li>
                            <li><span style="margin-right:8px;">🏦</span> BRI</li>
                            <li><span style="margin-right:8px;">🏦</span> CIMB Niaga</li>
                            <li><span style="margin-right:8px;">🏦</span> Permata Bank</li>
                        </ul>
                    </div>
                    <!-- Column 3: MALAYSIA (Red) -->
                    <div class="bank-col">
                        <div class="bank-header red">MALAYSIA</div>
                        <ul class="bank-list">
                            <li><span style="margin-right:8px;">🏦</span> Maybank</li>
                            <li><span style="margin-right:8px;">🏦</span> CIMB Bank</li>
                            <li><span style="margin-right:8px;">🏦</span> Public Bank</li>
                            <li><span style="margin-right:8px;">🏦</span> RHB Bank</li>
                            <li><span style="margin-right:8px;">🏦</span> Hong Leong Bank</li>
                            <li><span style="margin-right:8px;">🏦</span> AmBank</li>
                        </ul>
                    </div>
                    <!-- Column 4: THAILAND (Navy) -->
                    <div class="bank-col">
                        <div class="bank-header navy">THAILAND</div>
                        <ul class="bank-list">
                            <li><span style="margin-right:8px;">🏦</span> Kasikornbank</li>
                            <li><span style="margin-right:8px;">🏦</span> SCB</li>
                            <li><span style="margin-right:8px;">🏦</span> Bangkok Bank</li>
                            <li><span style="margin-right:8px;">🏦</span> Krungthai Bank</li>
                            <li><span style="margin-right:8px;">🏦</span> TMBThanachart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="section bg-light">
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
        </section>

        <!-- Call to Action -->
        <section class="section cta-section animate-on-scroll">
            <div class="container">
                <h2 class="cta-title">Ready to get started?</h2>
                <p class="cta-desc">
                    Create an account today and start accepting payments globally.
                </p>
                <a href="#" class="btn btn-white">Create Account</a>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php
get_footer();
