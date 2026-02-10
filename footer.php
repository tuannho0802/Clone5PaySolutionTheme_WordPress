<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Col 1: Logo & Description -->
            <div class="footer-col footer-brand">
                <div class="footer-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_demo.png" alt="5Pay Solution" width="131" height="40" style="filter: brightness(0) invert(1);"> 
                        <!-- Added filter to make logo white for blue bg -->
                    </a>
                </div>
                <p class="footer-desc">
                    5PAY specializes in secure payments, seamless payouts, and reliable settlements.
                </p>
            </div>
            
            <!-- Col 2: Contact -->
            <div class="footer-col footer-contact">
                <h3>CONTACT</h3>
                <ul class="contact-list">
                    <li>
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div class="contact-info">
                            <span class="label">Looking for collaboration?</span>
                            <a href="mailto:sales@5paysolution.com" class="value">sales@5paysolution.com</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </div>
                        <div class="contact-info">
                            <span class="label">Talk to us.</span>
                            <a href="https://telegram.me/MY5PAY" class="value">Telegram</a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Col 3: Company -->
            <div class="footer-col footer-links">
                <h3>COMPANY</h3>
                <ul class="company-list">
                    <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div>
        </div><!-- .footer-grid -->

        <div class="footer-bottom">
            <p>Copyright &copy; <?php echo date( 'Y' ); ?> 5PAY Solution LLC. All rights Reserved. Privacy Policy</p>
        </div>
    </div><!-- .container -->

    <!-- Scroll to Top Button -->
    <a href="#" id="scroll-to-top" class="scroll-to-top" aria-label="Scroll to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
    </a>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
