<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<div class="top-banner">
    <div class="container">
        <div class="banner-content">
            <span class="banner-text">CALL US NOW!</span>
            <a href="tel:<?php echo esc_attr(get_option('ct_phone')); ?>" class="banner-phone"><?php echo esc_html(get_option('ct_phone')); ?></a>
        </div>
    </div>
</div>

<div class="logo-container">
    <div class="container">
        <?php 
        $logo = get_option('ct_logo');
        if ($logo) {
            echo '<img src="' . esc_url($logo) . '" alt="' . get_bloginfo('name') . '" class="site-logo">';
        } else {
            echo '<h1 class="site-logo">' . get_bloginfo('name') . '</h1>';
        }
        ?>
    </div>
</div>

<nav class="main-navigation">
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav-menu',
            'container' => false,
        ));
        ?>
    </div>
</nav>

<main class="contact-page-content">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form Section -->
            <div class="contact-form-section">
                <h2>Contact Us</h2>
                <form class="contact-form" action="#" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-button">Send Message</button>
                </form>
            </div>

            <!-- Company Info Section -->
            <div class="company-info-section">
                <h2>Company Information</h2>
                <div class="company-details">
                    <h3><?php echo esc_html(get_bloginfo('name')); ?></h3>
                    <address>
                        <?php echo nl2br(esc_html(get_option('ct_address'))); ?>
                    </address>
                    <div class="contact-info">
                        <p><strong>Phone:</strong> <?php echo esc_html(get_option('ct_phone')); ?></p>
                        <p><strong>Fax:</strong> <?php echo esc_html(get_option('ct_fax')); ?></p>
                    </div>
                    <div class="social-icons">
                        <?php if ($facebook = get_option('ct_facebook')) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/fb-logo.png" alt="Facebook" width="30" height="30" />
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($twitter = get_option('ct_twitter')) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/t-logo.png" alt="Twitter" width="30" height="30" />
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($linkedin = get_option('ct_linkedin')) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/l-logo.png" alt="LinkedIn" width="30" height="30" />
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($pinterest = get_option('ct_pinterest')) : ?>
                            <a href="<?php echo esc_url($pinterest); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/p-logo.png" alt="Pinterest" width="30" height="30" />
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
</body>
</html> 