<?php
/*
Template Name: Homepage
*/
get_header();
?>

<div class="top-bar">
  <div class="banner-left">
    <span class="banner-text">CALL US NOW!</span>
    <span class="banner-phone">385.154.11.28.35</span>
  </div>
  <div class="banner-right">
    <a href="/login" class="banner-login">LOGIN</a>
    <a href="/signup" class="banner-signup">SIGNUP</a>
  </div>
</div>

<div class="gray-section">
  <div class="container">
    <div class="logo-text">
      <span class="your-text">YOUR</span>
      <span class="logo-text">LOGO</span>
    </div>
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
      <p><strong>Coalition Skills Test</strong><br>535 La Plata Street<br>4200 Argentina</p>
      <p>Phone: 385.154.11.28.38<br>
      Fax: 385.154.35.66.78</p>

      <div class="social-icons">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fb-logo.png" alt="Facebook" width="30" height="30" /></a>
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/socials.png" alt="Social Media" width="90" height="30" /></a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
