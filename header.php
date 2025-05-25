<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

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
		  <?php
		  wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'main-menu',
			'container'      => false,
			'fallback_cb'    => false,
		  ) );
		  ?>
		</nav>
	  </div>
	</div>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$ct_custom_description = get_bloginfo( 'description', 'display' );
			if ( $ct_custom_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
