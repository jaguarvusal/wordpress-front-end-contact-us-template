<?php
/*
Template Name: Homepage
*/
get_header();
?>

<div class="top-bar">
  <div class="banner-left">
    <span class="banner-text">CALL US NOW!</span>
    <span class="banner-phone"><?php echo esc_html(get_option('ct_phone')); ?></span>
  </div>
  <div class="banner-right">
    <a href="/login" class="banner-login">LOGIN</a>
    <a href="/signup" class="banner-signup">SIGNUP</a>
  </div>
</div>

<div class="gray-section">
  <div class="container">
    <?php 
    $logo = get_option('ct_logo');
    if ($logo) {
        echo '<img src="' . esc_url($logo) . '" alt="' . get_bloginfo('name') . '" class="site-logo">';
    } else {
        echo '<div class="logo-text">
            <span class="your-text">YOUR</span>
            <span class="logo-text">LOGO</span>
        </div>';
    }
    ?>
    <nav class="main-nav">
      <a href="#" class="nav-link">TITLE 1</a>
      <a href="#" class="nav-link bold">TITLE 2
        <div class="submenu-container">
          <div class="submenu-wrapper">
            <div class="submenu-item">SUBMENU 1</div>
            <div class="submenu-item">SUBMENU 2</div>
            <div class="submenu-item">SUBMENU 3</div>
          </div>
          <div class="submenu-wrapper">
            <div class="submenu-item">SUBMENU 1</div>
            <div class="submenu-item">SUBMENU 2</div>
            <div class="submenu-item">SUBMENU 3</div>
          </div>
        </div>
      </a>
      <a href="#" class="nav-link">TITLE 3</a>
      <a href="#" class="nav-link">TITLE 4</a>
      <a href="#" class="nav-link">TITLE 5</a>
      <a href="#" class="nav-link">TITLE 6</a>
      <a href="#" class="nav-link">TITLE 7</a>
    </nav>
  </div>
</div>

<main class="site-main">
  <section class="contact-section">
    <div class="contact-left">
      <div class="breadcrumb">
        <a href="#">Home</a> / <a href="#">Who We Are</a> / <span>Contact</span>
      </div>
      <h2>Contact</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere ipsum nec velit mattis elementum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas eu placerat metus, eget placerat libero.</p>

      <h3>Contact Us</h3>
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
      <h3>Reach Us</h3>
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
