<?php

/**
 * Plugin Name: User Registration With Review
 * Plugin URI: #
 * Author: Shankar Khadka
 * Author URI: #
 * Description: Renders the user's review with rating
 * Version: 1.0.0
 * Text Domain: user-review
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class UserRegister
{
    public function __construct()
    {

        //shortcode
        add_shortcode('urwr-register', array($this, 'urwr_shortcode_review_register_fn'));
        add_shortcode('urwr-render', array($this, 'urwr_shortcode_render_fn'));

        //filter hook
        add_filter('urwr_extract_username_email', array($this, 'urwr_extract_username_email_fn'));

        //action hook
        add_action('urwr_send_mail', array($this, 'urwr_send_mail_fn'));
        add_action('wp_enqueue_scripts', array($this, 'urwr_custom_script'));
        add_action('wp_ajax_urwr_reviews_register', array($this, 'urwr_reviews_register_fn'));
        add_action('wp_ajax_urwr_render_user_reviews', array($this, 'urwr_render_user_reviews'));
    }

    public function urwr_shortcode_review_register_fn()
    {
        ob_start();
        include_once plugin_dir_path(__FILE__) . 'template/review-form.php';
        return ob_get_clean();
    }

    public function urwr_extract_username_email_fn($email)
    {
        $username = strstr($email, '@', true);
        return $username;
    }

    public function urwr_send_mail_fn($email)
    {
        $subject = "Success";
        $content = "Successfully registered to the site";
        wp_mail($email, $subject, $content);
    }

    public function urwr_custom_script()
    {
        //enqueue bootstrap
        wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', array('jquery'), NULL, true);
        wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', false, NULL, 'all');

        //enqueue script
        $script = plugins_url('/assets/js/main.js', __FILE__);
        wp_enqueue_script('my-custom-js', $script, array('jquery'), '1.0.0', true);
        wp_localize_script('my-custom-js', 'urwr_obj', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('urwr_user_review_nonce'),
        ));
    }

    public function urwr_reviews_register_fn()
    {
        include plugin_dir_path(__FILE__) . 'includes/review-register.php';
    }

    public function urwr_shortcode_render_fn()
    {
        ob_start();
        if (is_user_logged_in()) {
?>
            <!-- render this html template -->
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rating_num"><?php esc_html_e('Search by Rating:', 'user-review'); ?></label>
                            <select class="form-control" id="rating_num">
                                <option disabled selected><?php esc_html_e('All Rating:', 'user-review'); ?></option>
                                <option value="1"><?php esc_html_e('1', 'user-review') ?></option>
                                <option value="2"><?php esc_html_e('2', 'user-review') ?></option>
                                <option value="3"><?php esc_html_e('3', 'user-review') ?></option>
                                <option value="4"><?php esc_html_e('4', 'user-review') ?></option>
                                <option value="5"><?php esc_html_e('5', 'user-review') ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="registered_date"><?php esc_html_e('Sort by Date', 'user-review'); ?></label>
                            <select class="form-control" id="registered_date">
                                <option value="" disabled selected><?php esc_html_e('Date Order:', 'user-review'); ?></option>
                                <option value="ASC"><?php esc_html_e('Ascending', 'user-review'); ?></option>
                                <option value="DESC"><?php esc_html_e('Descending', 'user-review'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- show the reviews   -->
                <div id="reviews-container" class="mt-4">
                    <!-- call to the function which contains the reviews list -->
                    <?php $this->urwr_render_user_reviews(); ?>
                </div>
            </div>
<?php
        } else {
            echo "You are not authorized to view this content";
        }
        return ob_get_clean();
    }

    //get the review according to rating and date 

    public function urwr_render_user_reviews()
    {
        include plugin_dir_path(__FILE__) . 'includes/review-filter.php';
    }
}

new UserRegister();
