<?php
/**
 * Title: Contact Form Section
 * Slug: fpay/contact-form
 * Categories: fpay-sections
 * Keywords: contact, form, wrapper
 */
?>
<!-- wp:group {"className":"pxl-contact-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group pxl-contact-section">
    <!-- wp:columns {"verticalAlignment":"top","className":"pxl-contact-columns"} -->
    <div class="wp-block-columns are-vertically-aligned-top pxl-contact-columns">
        <!-- wp:column {"width":"40%","className":"pxl-contact-info-col"} -->
        <div class="wp-block-column pxl-contact-info-col" style="flex-basis:40%">
            <!-- wp:heading {"level":2,"className":"pxl-contact-title"} -->
            <h2 class="wp-block-heading pxl-contact-title">Contact Us</h2>
            <!-- /wp:heading --><!-- wp:paragraph {"className":"pxl-contact-desc"} -->
            <p class="pxl-contact-desc">We are here to answer any question you may have. Feel free to reach via contact
                form.</p>
            <!-- /wp:paragraph --><!-- wp:group {"className":"pxl-contact-method-box","layout":{"type":"default"}} -->
            <div class="wp-block-group pxl-contact-method-box">
                <!-- wp:paragraph {"className":"pxl-method-icon-label"} -->
                <p class="pxl-method-icon-label">📧 Looking for collaboration?</p>
                <!-- /wp:paragraph --><!-- wp:paragraph {"className":"pxl-method-value"} -->
                <p class="pxl-method-value"><a href="mailto:sales@5paysolution.com">sales@5paysolution.com</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group --><!-- wp:group {"className":"pxl-contact-method-box","layout":{"type":"default"}} -->
            <div class="wp-block-group pxl-contact-method-box">
                <!-- wp:paragraph {"className":"pxl-method-icon-label"} -->
                <p class="pxl-method-icon-label">💬 Talk to us</p>
                <!-- /wp:paragraph --><!-- wp:paragraph {"className":"pxl-method-value"} -->
                <p class="pxl-method-value"><a href="https://t.me/5paysolution">Telegram</a></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column --><!-- wp:column {"width":"60%","className":"pxl-form-col"} -->
        <div class="wp-block-column pxl-form-col" style="flex-basis:60%"><!-- wp:html -->
            <form method="POST" action="/wp-json/contact/submit" class="pxl-contact-form">
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone No *</label>
                    <input type="tel" id="phone" name="phone" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="company">Company Name *</label>
                    <input type="text" id="company" name="company" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="website">Business Website *</label>
                    <input type="url" id="website" name="website" required class="form-control">
                </div>
  <div class="form-group">
    <label for="telegram">Teams and Telegram Contact (Optional)</label>
    <input type="text" id="telegram" name="telegram" class="form-control" placeholder="e.g., @username or Teams link">
  </div>
  
  <div class="form-group">
    <label for="message">Message *</label>
    <textarea id="message" name="message" rows="5" required class="form-control"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Send Mail</button>
</form>
<!-- /wp:html --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->