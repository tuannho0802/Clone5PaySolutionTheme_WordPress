<?php
/**
 * Title: Solutions Zig-Zag
 * Slug: fivepay-v2/solutions-zigzag
 * Categories: 5pay-theme
 * Description: Alternating layout of text and images.
 */
?>
<!-- wp:group {"className":"section section-solutions has-background","style":{"color":{"background":"#ffffff"}}} -->
<div class="wp-block-group section section-solutions has-background" style="background-color: #ffffff">
    <div class="container">
        <!-- wp:group {"className":"section-header animate-on-scroll"} -->
        <div class="wp-block-group section-header animate-on-scroll">
            <!-- wp:heading {"textAlign":"center","level":2,"className":"section-title"} -->
            <h2 class="wp-block-heading has-text-align-center section-title">Our Solutions</h2>
            <!-- /wp:heading -->
            <!-- wp:paragraph {"align":"center","className":"section-subtitle"} -->
            <p class="has-text-align-center section-subtitle">Designed to increase conversions and reduce fraud at every
                step.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"className":"zigzag-section animate-on-scroll"} -->
        <div class="wp-block-columns zigzag-section animate-on-scroll">
            <!-- wp:column {"className":"zigzag-image"} -->
            <div class="wp-block-column zigzag-image">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large"><img src="https://placehold.co/600x400"
                        alt="Integrated Full Package UI" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"verticalAlignment":"center","className":"zigzag-content"} -->
            <div class="wp-block-column is-vertically-aligned-center zigzag-content">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading">Integrated Full Package</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Get full access to your full-fledge package with receiving accounts. It includes a one-on-one
                    customer service to manage your accounts along with streamlined checkout flows, funds receiving,
                    assets stashing down to optimisation, payout and settlement and more so you can focus on building
                    the next big thing.</p>
                <!-- /wp:paragraph -->
                <!-- wp:list -->
                <ul class="wp-block-list">
                    <!-- wp:list-item -->
                    <li>✓ Streamlined checkout flows</li><!-- /wp:list-item -->
                    <!-- wp:list-item -->
                    <li>✓ Dedicated account management</li><!-- /wp:list-item -->
                    <!-- wp:list-item -->
                    <li>✓ Optimized payout and settlement</li><!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"btn btn-primary"} -->
                    <div class="wp-block-button is-style-btn-primary"><a class="wp-block-button__link btn btn-primary"
                            href="#">Learn More</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns {"className":"zigzag-section reverse animate-on-scroll"} -->
        <div class="wp-block-columns zigzag-section reverse animate-on-scroll">
            <!-- wp:column {"className":"zigzag-image"} -->
            <div class="wp-block-column zigzag-image">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
                <figure class="wp-block-image size-large"><img src="https://placehold.co/600x400"
                        alt="System Integration UI" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
            <!-- wp:column {"verticalAlignment":"center","className":"zigzag-content"} -->
            <div class="wp-block-column is-vertically-aligned-center zigzag-content">
                <!-- wp:heading {"level":3} -->
                <h3 class="wp-block-heading">System Integration Only</h3>
                <!-- /wp:heading -->
                <!-- wp:paragraph -->
                <p>Launch and scale embedded payments through our integrated system which is easily setup in minutes,
                    not days. The ease of onboarding gives you the full access to our dashboard with the help from our
                    5pay experts to assist you whenever you need. Comes in affordable pricing built for businesses for
                    all sizes.</p>
                <!-- /wp:paragraph -->
                <!-- wp:list -->
                <ul class="wp-block-list">
                    <!-- wp:list-item -->
                    <li>✓ Setup in minutes, not days</li><!-- /wp:list-item -->
                    <!-- wp:list-item -->
                    <li>✓ Affordable pricing for all sizes</li><!-- /wp:list-item -->
                    <!-- wp:list-item -->
                    <li>✓ Developer-friendly API</li><!-- /wp:list-item -->
                </ul>
                <!-- /wp:list -->
                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"btn btn-outline"} -->
                    <div class="wp-block-button is-style-btn-outline"><a class="wp-block-button__link btn btn-outline"
                            href="#">Read Documentation</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
</div>
<!-- /wp:group -->