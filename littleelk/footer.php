<div class="lesp_footer-insta">
    <?php echo do_shortcode('[instagram-feed]'); ?>
</div>
<footer class="lesp_global-footer">
    <div class="lesp_wrap">

    </div>
    <div class="lesp_wrap">
        <div>Site, products, design and content &copy; Little Elk <?php echo the_date('Y'); ?></div>
        <div><img src="<?php bloginfo('stylesheet_directory'); ?>/img/payment-providers.png" alt="Payment Providers"></div>
    </div>
</footer>
<section class="lesp_newsletter-popup">
    <div class="lesp_newsletter-popup-container">
        <button class="lesp_popup-toggle">X</button>
        <div class="lesp_newsletter-popup-form">
            <div class="lesp_newsletter-popup-image">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/newsletter-house.svg">
            </div>
            <div class="lesp_newsletter-popup-form-wrap">
                <form>
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
        </div>
        <div class="lesp_newsletter-popup-content">
            <p>Sign up to our monthly newsletter and get 10% off of your first order.</p>
            <p>You will also be the first to hear about our monthly giveaways and new products.</p>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>
