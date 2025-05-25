<?php
/*
Template Name: Homepage
*/
get_header();
?>

<main class="site-main">
  <section class="contact-section">
    <div class="contact-left">
      <div class="breadcrumb">
        <?php
        // Get the current page ID
        $current_page_id = get_the_ID();
        
        // Start with home link
        echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
        
        // Get the page hierarchy
        $ancestors = get_post_ancestors($current_page_id);
        
        // Add ancestor pages to breadcrumb
        if ($ancestors) {
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor) {
                echo ' / <a href="' . esc_url(get_permalink($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a>';
            }
        }
        
        // Add current page
        echo ' / <span>' . esc_html(get_the_title()) . '</span>';
        ?>
      </div>
      <h2><?php echo esc_html(get_theme_mod('ct_contact_header', 'Contact')); ?></h2>
      <p><?php echo wp_kses_post(get_theme_mod('ct_contact_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere ipsum nec velit mattis elementum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas eu placerat metus, eget placerat libero.')); ?></p>

      <h3><?php echo esc_html(get_theme_mod('ct_contact_us_header', 'Contact Us')); ?></h3>
      <form>
        <div class="input-row">
          <input type="text" placeholder="Name *" class="name-field">
          <div class="contact-fields">
            <input type="text" placeholder="Phone *">
            <input type="email" placeholder="Email *">
          </div>
        </div>
        <textarea placeholder="Message *"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>

    <div class="contact-right">
      <h3><?php echo esc_html(get_theme_mod('ct_reach_us_header', 'Reach Us')); ?></h3>
      <p><strong><?php echo esc_html(get_bloginfo('name')); ?></strong><br><?php echo nl2br(esc_html(get_option('ct_address'))); ?></p>
      <p>Phone: <?php echo esc_html(get_option('ct_phone')); ?><br>
      Fax: <?php echo esc_html(get_option('ct_fax')); ?></p>

      <div class="social-icons">
        <?php 
        $facebook = get_option('ct_facebook');
        $twitter = get_option('ct_twitter');
        $linkedin = get_option('ct_linkedin');
        $pinterest = get_option('ct_pinterest');
        
        // Debug output
        echo "<!-- Debug: Facebook URL: " . esc_html($facebook) . " -->\n";
        echo "<!-- Debug: Twitter URL: " . esc_html($twitter) . " -->\n";
        echo "<!-- Debug: LinkedIn URL: " . esc_html($linkedin) . " -->\n";
        echo "<!-- Debug: Pinterest URL: " . esc_html($pinterest) . " -->\n";
        
        if ($facebook) : ?>
            <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/fb-logo.png" alt="Facebook" width="30" height="30" />
            </a>
        <?php endif; ?>
        
        <?php if ($twitter) : ?>
            <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/t-logo.png" alt="Twitter" width="30" height="30" />
            </a>
        <?php endif; ?>
        
        <?php if ($linkedin) : ?>
            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/l-logo.png" alt="LinkedIn" width="30" height="30" />
            </a>
        <?php endif; ?>
        
        <?php if ($pinterest) : ?>
            <a href="<?php echo esc_url($pinterest); ?>" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/p-logo.png" alt="Pinterest" width="30" height="30" />
            </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
