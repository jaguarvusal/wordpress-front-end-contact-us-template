<?php
/**
 * Theme Settings Page
 */

// Add the theme settings page to the admin menu
function ct_theme_settings_menu() {
    add_theme_page(
        'Theme Settings', // Page title
        'Theme Settings', // Menu title
        'manage_options', // Capability
        'theme-settings', // Menu slug
        'ct_theme_settings_page' // Function to display the page
    );
}
add_action('admin_menu', 'ct_theme_settings_menu');

// Register settings
function ct_register_theme_settings() {
    register_setting('ct_theme_settings', 'ct_logo');
    register_setting('ct_theme_settings', 'ct_phone');
    register_setting('ct_theme_settings', 'ct_address');
    register_setting('ct_theme_settings', 'ct_fax');
    register_setting('ct_theme_settings', 'ct_facebook');
    register_setting('ct_theme_settings', 'ct_twitter');
    register_setting('ct_theme_settings', 'ct_linkedin');
    register_setting('ct_theme_settings', 'ct_pinterest');
}
add_action('admin_init', 'ct_register_theme_settings');

// Add media uploader scripts
function ct_theme_settings_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('ct-theme-settings', get_template_directory_uri() . '/js/theme-settings.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'ct_theme_settings_scripts');

// Create the settings page
function ct_theme_settings_page() {
    ?>
    <div class="wrap">
        <h1>Theme Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ct_theme_settings');
            do_settings_sections('ct_theme_settings');
            ?>
            
            <table class="form-table">
                <!-- Logo Upload -->
                <tr>
                    <th scope="row">Logo</th>
                    <td>
                        <div class="logo-preview">
                            <?php 
                            $logo = get_option('ct_logo');
                            if ($logo) {
                                echo '<img src="' . esc_url($logo) . '" style="max-width: 200px; margin-bottom: 10px;">';
                            }
                            ?>
                        </div>
                        <input type="text" name="ct_logo" id="ct_logo" value="<?php echo esc_attr(get_option('ct_logo')); ?>" class="regular-text">
                        <input type="button" class="button button-secondary" value="Upload Logo" id="upload_logo_button">
                        <p class="description">Upload your site logo (recommended size: 200x50px)</p>
                    </td>
                </tr>

                <!-- Phone Number -->
                <tr>
                    <th scope="row">Phone Number</th>
                    <td>
                        <input type="text" name="ct_phone" value="<?php echo esc_attr(get_option('ct_phone')); ?>" class="regular-text">
                    </td>
                </tr>

                <!-- Address -->
                <tr>
                    <th scope="row">Address</th>
                    <td>
                        <textarea name="ct_address" rows="5" class="large-text"><?php echo esc_textarea(get_option('ct_address')); ?></textarea>
                    </td>
                </tr>

                <!-- Fax Number -->
                <tr>
                    <th scope="row">Fax Number</th>
                    <td>
                        <input type="text" name="ct_fax" value="<?php echo esc_attr(get_option('ct_fax')); ?>" class="regular-text">
                    </td>
                </tr>

                <!-- Social Media Links -->
                <tr>
                    <th scope="row">Social Media Links</th>
                    <td>
                        <fieldset>
                            <p>
                                <label for="ct_facebook">Facebook URL:</label><br>
                                <input type="url" name="ct_facebook" id="ct_facebook" value="<?php echo esc_url(get_option('ct_facebook')); ?>" class="regular-text">
                            </p>
                            <p>
                                <label for="ct_twitter">Twitter URL:</label><br>
                                <input type="url" name="ct_twitter" id="ct_twitter" value="<?php echo esc_url(get_option('ct_twitter')); ?>" class="regular-text">
                            </p>
                            <p>
                                <label for="ct_linkedin">LinkedIn URL:</label><br>
                                <input type="url" name="ct_linkedin" id="ct_linkedin" value="<?php echo esc_url(get_option('ct_linkedin')); ?>" class="regular-text">
                            </p>
                            <p>
                                <label for="ct_pinterest">Pinterest URL:</label><br>
                                <input type="url" name="ct_pinterest" id="ct_pinterest" value="<?php echo esc_url(get_option('ct_pinterest')); ?>" class="regular-text">
                            </p>
                        </fieldset>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
} 