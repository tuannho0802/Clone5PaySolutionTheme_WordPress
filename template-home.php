<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="hero-section" style="padding: 100px 0; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 40px;">
                <div style="flex: 1; min-width: 300px;">
                    <h1 style="font-size: 48px; margin-bottom: 24px; color: var(--color-primary);">
                        Payments Infrastructure for the Internet.
                    </h1>
                    <p style="font-size: 18px; color: var(--color-text-light); margin-bottom: 32px; max-width: 500px;">
                        Accept Every Payment On One Platform & Drive More Sales Anywhere In The World. Discover All Payment Options today.
                    </p>
                    <div class="hero-actions">
                        <a href="#" class="btn btn-primary" style="margin-right: 16px;">Start Now</a>
                        <a href="#" class="btn btn-outline">Contact Sales</a>
                    </div>
                </div>
                <div style="flex: 1; min-width: 300px; display: flex; justify-content: center;">
                    <!-- Placeholder for Hero Image -->
                    <div style="width: 100%; height: 400px; background: white; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center;">
                        <span style="color: var(--color-text-light);">Dashboard / App Preview Image</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners / Trust Badge -->
    <section class="section" style="padding: 40px 0; border-bottom: 1px solid var(--color-border);">
        <div class="container" style="text-align: center;">
            <p style="color: var(--color-text-light); margin-bottom: 24px; font-weight: 600;">TRUSTED BY PARTNERS ACROSS ASIA</p>
            <div style="display: flex; justify-content: center; gap: 40px; opacity: 0.6; flex-wrap: wrap;">
                <span>Partner 1</span>
                <span>Partner 2</span>
                <span>Partner 3</span>
                <span>Partner 4</span>
                <span>Partner 5</span>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section class="section" style="background-color: var(--color-white);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Solutions</h2>
                <p class="section-subtitle">The perfect solutions for all your payment needs to supercharge your business.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
                <!-- Card 1 -->
                <div class="card">
                    <div style="width: 50px; height: 50px; background: var(--color-light-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <span style="font-size: 24px;">💸</span>
                    </div>
                    <h3>Payment Transfer</h3>
                    <p style="color: var(--color-text-light);">Local currency transfer supported in multi-currency (MYR, VND). Intuitive manual transfer with no restriction in supported banks.</p>
                    <a href="#" style="color: var(--color-primary); font-weight: 600;">Learn more &rarr;</a>
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <div style="width: 50px; height: 50px; background: var(--color-light-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <span style="font-size: 24px;">📱</span>
                    </div>
                    <h3>QR Pay</h3>
                    <p style="color: var(--color-text-light);">Supported in multi-currency. THB PromptPay, Viet QR, MYR DuitNow. 3 steps easy-payment: Open > Scan > Verify.</p>
                    <a href="#" style="color: var(--color-primary); font-weight: 600;">Learn more &rarr;</a>
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <div style="width: 50px; height: 50px; background: var(--color-light-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                        <span style="font-size: 24px;">⚙️</span>
                    </div>
                    <h3>System Integration</h3>
                    <p style="color: var(--color-text-light);">Launch and scale embedded payments through our integrated system. Setup in minutes, not days.</p>
                    <a href="#" style="color: var(--color-primary); font-weight: 600;">Learn more &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="section" style="background-color: var(--color-light-bg);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Why Choose Us?</h2>
                <p class="section-subtitle">Designed to help you capture more revenue.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 32px;">
                <div class="feature-item">
                    <h4 style="color: var(--color-primary);">Setup in Minutes</h4>
                    <p style="font-size: 14px; color: var(--color-text-light);">Open account within 1 day with minimum KYC process.</p>
                </div>
                <div class="feature-item">
                    <h4 style="color: var(--color-primary);">Quick Transactions</h4>
                    <p style="font-size: 14px; color: var(--color-text-light);">Payment process is as fast as 1 min deposit flow.</p>
                </div>
                <div class="feature-item">
                    <h4 style="color: var(--color-primary);">Secure Banking</h4>
                    <p style="font-size: 14px; color: var(--color-text-light);">Integrated with ISO standard to ensure optimum security.</p>
                </div>
                <div class="feature-item">
                    <h4 style="color: var(--color-primary);">24/7 Support</h4>
                    <p style="font-size: 14px; color: var(--color-text-light);">Our tested team is always on top to serve you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section" style="background-color: var(--color-primary); color: white; text-align: center;">
        <div class="container">
            <h2 style="color: white; margin-bottom: 24px;">Ready to get started?</h2>
            <p style="margin-bottom: 32px; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">
                Create an account today and start accepting payments globally.
            </p>
            <a href="#" class="btn" style="background: white; color: var(--color-primary);">Create Account</a>
        </div>
    </section>

</main>

<?php
get_footer();
