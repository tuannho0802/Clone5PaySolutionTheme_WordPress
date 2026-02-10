<?php
/**
 * Title: Contact Form Section
 * Slug: fpay/contact-form
 * Categories: fpay-sections
 * Keywords: contact, form, wrapper
 */
?>
<section class="pxl-contact-form-section">
    <div class="pxl-container">
        <div class="pxl-contact-row">
            <!-- Left Column: Contact Info -->
            <div class="pxl-contact-info-column">
                <div class="pxl-contact-info-inner">
                    <h3 class="pxl-info-title">Let us help you get your project started.</h3>
                    
                    <div class="pxl-contact-info-block">
                        <h6 class="pxl-contact-subtitle">Contact</h6>
                        <a href="mailto:sales@5paysolution.com" class="pxl-contact-email">sales@5paysolution.com</a>
                        <div class="pxl-contact-addresses">
                            <p class="pxl-address-item"><strong>London:</strong> +44(0)20 3156</p>
                            <p class="pxl-address-item"><strong>New York:</strong> +1 866 512 0268</p>
                        </div>
                    </div>

                    <div class="pxl-contact-info-block">
                        <h6 class="pxl-contact-subtitle">Follow Us</h6>
                        <div class="pxl-social-links">
                            <a href="https://t.me/5pay_support" target="_blank" class="pxl-social-icon telegram"><i class="fab fa-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form -->
            <div class="pxl-contact-form-column">
                <div class="pxl-contact-form-inner">
                    <h3 class="pxl-form-title">Start your project</h3>
                    
                    <form id="pxl-contact-form" class="pxl-form" method="POST">
                        <div class="pxl-form-grid">
                            <div class="pxl-form-field col-6">
                                <input type="text" name="your-name" placeholder="Your Name" required>
                            </div>
                            <div class="pxl-form-field col-6">
                                <input type="email" name="your-email" placeholder="Your Email" required>
                            </div>
                            <div class="pxl-form-field col-6">
                                <input type="text" name="your-phone" placeholder="Phone No" required>
                            </div>
                            <div class="pxl-form-field col-6">
                                <input type="text" name="your-subject" placeholder="Subject" required>
                            </div>
                            <div class="pxl-form-field col-12">
                                <textarea name="your-message" placeholder="Text Here" rows="5" required></textarea>
                            </div>
                        </div>
                        
                        <div class="pxl-form-acceptance">
                            <label>
                                <input type="checkbox" name="acceptance" required>
                                <span>I agree to the terms & conditions of service.</span>
                            </label>
                        </div>
                        
                        <div class="pxl-form-submit">
                            <button type="submit" class="pxl-btn pxl-btn-primary">
                                <span class="pxl-btn-text">Get A Quote</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>