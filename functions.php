<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */

if ( ! function_exists( 'ct_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'ct-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init() {
	// Remove sidebar registration
}
add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts() {
	wp_enqueue_style( 'ct-custom-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ct-custom-navigation', get_template_directory_uri() . '/assets/css/navigation.css', array(), '1.0.0' );

	wp_enqueue_script( 'ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Include theme settings
require get_template_directory() . '/inc/theme-settings.php';

// Include custom menu walker
require get_template_directory() . '/inc/class-ct-custom-menu-walker.php';

add_theme_support( 'page-attributes' );

// Hide admin bar for non-admin users
function hide_admin_bar() {
	if (!current_user_can('administrator')) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'hide_admin_bar');

function ct_custom_theme_settings_menu() {
    add_theme_page(
        'Theme Settings',            // Page title
        'CT Theme Settings',         // Menu title
        'manage_options',            // Capability
        'ct-theme-settings',         // Menu slug
        'ct_custom_theme_settings_page' // Callback function
    );
}
add_action('admin_menu', 'ct_custom_theme_settings_menu');

function ct_custom_theme_settings_page() {
    ?>
    <div class="wrap">
        <h1>Theme Settings</h1>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields('ct_theme_settings_group');
            do_settings_sections('ct-theme-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function ct_custom_register_settings() {
    // Logo
    register_setting('ct_theme_settings_group', 'ct_logo');
    add_settings_section('ct_main_section', '', null, 'ct-theme-settings');

    add_settings_field('ct_logo', 'Logo', 'ct_logo_callback', 'ct-theme-settings', 'ct_main_section');
    function ct_logo_callback() {
        $logo = get_option('ct_logo');
        echo '<input type="text" name="ct_logo" value="' . esc_attr($logo) . '" class="regular-text">';
        echo '<p>Upload logo via Media → Library and paste URL here</p>';
    }

    // Phone Number
    register_setting('ct_theme_settings_group', 'ct_phone');
    add_settings_field('ct_phone', 'Phone Number', function() {
        echo '<input type="text" name="ct_phone" value="' . esc_attr(get_option('ct_phone')) . '" class="regular-text">';
    }, 'ct-theme-settings', 'ct_main_section');

    // Address
    register_setting('ct_theme_settings_group', 'ct_address');
    add_settings_field('ct_address', 'Address', function() {
        echo '<textarea name="ct_address" class="large-text" rows="3">' . esc_textarea(get_option('ct_address')) . '</textarea>';
    }, 'ct-theme-settings', 'ct_main_section');

    // Fax Number
    register_setting('ct_theme_settings_group', 'ct_fax');
    add_settings_field('ct_fax', 'Fax Number', function() {
        echo '<input type="text" name="ct_fax" value="' . esc_attr(get_option('ct_fax')) . '" class="regular-text">';
    }, 'ct-theme-settings', 'ct_main_section');

    // Social Media Links
    $socials = ['facebook', 'twitter', 'linkedin', 'pinterest'];
    foreach ($socials as $social) {
        $key = 'ct_' . $social;
        register_setting('ct_theme_settings_group', $key);
        add_settings_field($key, ucfirst($social) . ' URL', function() use ($key) {
            echo '<input type="url" name="' . $key . '" value="' . esc_attr(get_option($key)) . '" class="regular-text">';
        }, 'ct-theme-settings', 'ct_main_section');
    }
}
add_action('admin_init', 'ct_custom_register_settings');
