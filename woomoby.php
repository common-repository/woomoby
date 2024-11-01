<?php
/*
  Plugin Name: WooMoby
  Plugin URI: http://woomoby.com
  Description: Woomoby turns your Word Press Woo Commerce website into a mobile shopping app!  Give your customers the option to shop using the app in Android or IOS.
  Version: 1.3.14
  Author:  Woomoby.com
  Author URI: http://woomoby.com
 */
if (!defined('WPINC'))
    die;
if (!class_exists('CP_wooMoby_Core'))
    die;
// Set the version
define('WOOMOBY_VERSION', '1.3.14');

class CP_wooMoby_Core {

    protected static $instance = null;
    protected $globals;
    protected static $plugin_name = 'WooMoby';
    protected static $plugin_slug = 'cp-woomoby';
    protected static $core_options_key = 'cp_core_options';
    protected static $settings_options_key = 'cp_settings_options';
    protected static $plugin_connect_url = 'http://woomoby.com/';
    protected static $theme_folder_name = 'woomoby';
    protected $plugin_dir;
    protected $plugin_path;
    protected $plugin_url;

    public function __construct() {
        register_uninstall_hook(__FILE__, array('CP_wooMoby_Core', 'woomoby_uninstall'));
        register_deactivation_hook(__FILE__, array('CP_wooMoby_Core', 'woomoby_deactivate'));
        register_activation_hook(__FILE__, array('CP_wooMoby_Core', 'woomoby_create_pages'));
        add_action('admin_menu', array($this, 'woomoby_menu_options'));
        add_action('admin_enqueue_scripts', array($this, 'woomoby_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'woomoby_scripts_styles'));
        add_filter('plugin_action_links', array($this, 'woomoby_action_links'), 10, 2);
        add_action( 'upgrader_process_complete', array($this,'woomoby_upgrade_completed'), 10, 2 );
    //  add_action( 'setup_theme', array($this, 'load_woomoby_theme') );
        add_action('widgets_init', array($this, 'woomoby_widgets'));
        add_action('admin_head', array($this, 'woomoby_custom_js'));
    }

    /**
     * Set the instance
     */
    public static function woomoby_instance() {
        static $globals;
        if (self::$instance == null) {
            self::$instance = new self;
            $globals = self::$instance->woomoby_set_globals();
            self::$instance->woomoby_load_includes();
        }
        return $globals;
    }

    /**
     * Set Globals
     */
    public function woomoby_set_globals() {
        $this->plugin_file = __FILE__;
        $this->plugin_dir = dirname(plugin_basename($this->plugin_file));
        $this->plugin_path = plugin_dir_path($this->plugin_file);
        $this->plugin_url = plugin_dir_url($this->plugin_file);
        $this->theme_dir = get_template_directory_uri();

        $globals = array(
            'plugin_name' => self::$plugin_name,
            'plugin_slug' => self::$plugin_slug,
            'plugin_dir' => $this->plugin_dir,
            'plugin_path' => $this->plugin_path,
            'plugin_url' => $this->plugin_url,
            'theme_dir' => $this->theme_dir,
            'core_options_key' => self::$core_options_key,
            'settings_options_key' => self::$settings_options_key,
            'plugin_connect_url' => self::$plugin_connect_url,
            'theme_folder_name' => self::$theme_folder_name
        );

        $this->globals = $globals;
        return $globals;
    }

    /**
     * Set up the global options pages
     */
    public function woomoby_menu_options() {
        add_menu_page($this->globals['plugin_name'], $this->globals['plugin_name'], 'manage_options', $this->globals['plugin_slug'], array($this, 'woomoby_options_page'), $this->globals['plugin_url'] . 'assets/images/mobile-app.png', 51);
    }

    public function woomoby_options_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.', 'woomoby'));
        }

        $this->page_tabs['dashboard'] = '<i class="icon cp-display position-left"></i> ' . __('Dashboard', 'woomoby');
        $this->page_tabs['settings'] = '<i class="icon cp-equalizer position-left"></i> ' . __('Settings', 'woomoby');

        include_once( $this->globals['plugin_path'] . 'views/options-page.php' );
    }

    /**
     * Enqueue CSS and JS
     */
    public function woomoby_enqueue_scripts($hook) {
        if ($hook != 'toplevel_page_cp-woomoby')
            return;

        wp_enqueue_media();

        // Styles
        wp_enqueue_style('cp-bs-style', $this->globals['plugin_url'] . 'assets/css/bootstrap4.min.css');
        wp_enqueue_style('cp-style', $this->globals['plugin_url'] . 'assets/css/style.css');
        wp_enqueue_style('cp-custom-style', $this->globals['plugin_url'] . 'views/woomoby-custom.css');

        // Scripts
        wp_enqueue_script('cp-bs-tether', $this->globals['plugin_url'] . 'assets/js/tether.min.js');
        wp_enqueue_script('cp-bs-script', $this->globals['plugin_url'] . 'assets/js/bootstrap4.min.js');
        wp_enqueue_script('cp-ace-script', $this->globals['plugin_url'] . 'assets/js/ace/ace.js');
        wp_enqueue_script('cp-script', $this->globals['plugin_url'] . 'assets/js/app.js', array('jquery'));

        wp_localize_script('cp-script', 'cp_admin_vars', array(
            'cp_images_action' => wp_create_nonce('cp_images_nonce')
                )
        );
    }

    public function woomoby_scripts_styles() {
        if(is_page(array('woomoby','woomoby-wishlist','woomoby-cart','woomoby-account','woomoby-checkout'))):
        wp_enqueue_style('cp-bs-style', $this->globals['plugin_url'] . 'assets/css/bootstrap4.min.css');
        wp_enqueue_style('cp-all-style', $this->globals['plugin_url'] . 'assets/css/all-v3.css', array(),WOOMOBY_VERSION, 'all');
        wp_enqueue_style('cp-font-awsome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), WOOMOBY_VERSION, 'all');
        wp_enqueue_style('cp-fonts-style', 'https://fonts.googleapis.com/css?family=Open+Sans', array(),WOOMOBY_VERSION, 'all');
        wp_enqueue_style('cp-product-slider-style', $this->globals['plugin_url'] . 'assets/css/woomoby-product-slider-v3.css', array(), WOOMOBY_VERSION, 'all');

        wp_enqueue_script('jquery');
        wp_enqueue_script('cp-bs-tether', $this->globals['plugin_url'] . 'assets/js/tether.min.js');
        wp_enqueue_script('cp-bs-script', $this->globals['plugin_url'] . 'assets/js/bootstrap4.min.js');        
        wp_enqueue_script('cp-custom-script', $this->globals['plugin_url'] . 'assets/js/woomoby-custom-v2.js',array(),WOOMOBY_VERSION,true);
        wp_enqueue_script('cp-custom-slider', $this->globals['plugin_url'] . 'assets/js/woomoby-slider.js',array(),'',true);
        endif;
    }

    /**
     * Load necessary files
     */
    public function woomoby_load_includes() {
        if (is_admin()) {
            include_once( $this->globals['plugin_path'] . 'includes/class-settings.php' );
            include_once( $this->globals['plugin_path'] . 'includes/class-helpers.php' );
        }
    }
    
   public function woomoby_upgrade_completed( $upgrader_object, $options ) {
 // The path to our plugin's main file
 $our_plugin = plugin_basename( __FILE__ );
 echo $our_plugin;
 // If an update has taken place and the updated type is plugins and the plugins element exists
 if( $options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
  echo 'plz update the plugin ';
     
  foreach( $options['plugins'] as $plugin ) {
   if( $plugin == $our_plugin ) {
    // Set a transient to record that our plugin has just been updated
       echo 'My Plugin Updated ';
   }
  }
 }
}

    
    /**
     * Plugin page action links
     */
    public function woomoby_action_links($links, $file) {
        static $this_plugin;

        if (!$this_plugin) {
            $this_plugin = plugin_basename(__FILE__);
        }

        if ($file == $this_plugin) {
            $settings = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=' . self::$plugin_slug . '">Settings</a>';
            array_unshift($links, $settings);
        }

        return $links;
    }

    /**
     * Register widget area
     */
    public function woomoby_widgets() {
        $widget_args['sidebar'] = array(
            'name' => __('wooMoby Shop Sidebar', 'woomoby'),
            'id' => 'cp-shop-sidebar',
            'description' => __('Widgets added to this region will appear on the right panel on the shop page.', 'woomoby')
        );

        $widget_args['footer'] = array(
            'name' => __('wooMoby Footer', 'woomoby'),
            'id' => 'cp-footer',
            'description' => __('Widgets added to this region will appear before the footer copyright.', 'woomoby')
        );

        foreach ($widget_args as $sidebar => $args) {
            $widget_tags = array(
                'before_widget' => '<div id="%1$s" class="side-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2>',
                'after_title' => '</h2>'
            );

            register_sidebar($args);
        }
    }

    public function woomoby_custom_js() {
        echo '<script> var pluginUrl ="' . plugin_dir_url(__FILE__) . '";</script>';
    }

    public function woomoby_create_pages() {
        $wm_helpers = new CP_wooMoby_Helpers();
        $settings = get_option(self::$settings_options_key);

        $pagetemplate = 'mobileapp-template.php';
        $template = plugin_dir_path(__FILE__) . $pagetemplate;
        $destination = get_template_directory() . '/' . $pagetemplate;
        $checktemp = 'mobileapp-checkout.php';
        $checkouttemplate = plugin_dir_path(__FILE__) . $checktemp;
        $destinationcheck = get_template_directory() . '/' . $checktemp;
        // Check if template exists
        if((locate_template($pagetemplate)!='') && (locate_template($checktemp)!='')){
            unlink($destination);
            unlink($destinationcheck);    
            copy($template, $destination);    
            copy($checkouttemplate, $destinationcheck);
        }else{
            copy($template, $destination);    
            copy($checkouttemplate, $destinationcheck);
        }
        
        $woomobyCheckoutId = -1;
        $woomobyCheckoutSlug = 'woomoby-checkout';
        $checkoutTitle = 'Woomoby Checkout';
        $checkoutContent = '[woocommerce_checkout]';
        // Check if page exists, if not create it
        if (null == get_page_by_title($checkoutTitle)) {
            $checkout_page = array(
                'post_name' => $woomobyCheckoutSlug,
                'post_title' => $checkoutTitle,
                'post_content' => $checkoutContent,
                'post_status' => 'publish',
                'post_type' => 'page'
            );
            $woomobyCheckoutId = wp_insert_post($checkout_page);
            if (!$woomobyCheckoutId) {
                wp_die('Error creating template page');
            } else {
                update_post_meta($woomobyCheckoutId, '_wp_page_template', $checktemp);
            }
        } // end check if

        $carttemp = 'mobileapp-cart.php';
        $carttemplate = plugin_dir_path(__FILE__) . $carttemp;
        $destinationcart = get_template_directory() . '/' . $carttemp;
        // Check if template exists
        if(locate_template($carttemp)!=''){
            unlink($destinationcart);
            copy($carttemplate, $destinationcart);
        }else{
            copy($carttemplate, $destinationcart);
        }
        $woomobyCarttId = -1;
        $woomobyCartSlug = 'woomoby-cart';
        $cartTitle = 'Woomoby Cart';
        $cartContent = '';
        // Check if page exists, if not create it
        if (null == get_page_by_title($cartTitle)) {
            $cart_page = array(
                'post_name' => $woomobyCartSlug,
                'post_title' => $cartTitle,
                'post_content' => $cartContent,
                'post_status' => 'publish',
                'post_type' => 'page'
            );
            $woomobyCarttId = wp_insert_post($cart_page);
            if (!$woomobyCarttId) {
                wp_die('Error creating template page');
            } else {
                update_post_meta($woomobyCarttId, '_wp_page_template', $carttemp);
            }
        } // end check if

        $accounttemp = 'mobileapp-account.php';
        $accounttemplate = plugin_dir_path(__FILE__) . $accounttemp;
        $destinationaccount = get_template_directory() . '/' . $accounttemp;
        // Check if template exists
        if(locate_template($accounttemp)!=''){
            unlink($destinationaccount);
            copy($accounttemplate, $destinationaccount);
        }else{
           copy($accounttemplate, $destinationaccount);
        }
        $woomobyAccountId = -1;
        $woomobyAccountSlug = 'woomoby-account';
        $accountTitle = 'Woomoby Account';
        $accountContent = '<ul class="dashboard-links"><li><a href="' . home_url() . '/woomoby-account/">Dashboard</a></li><li><a href="' . home_url() . '/woomoby-account/?woomobyPage=edit-account">Account details</a></li><li><a href="' . home_url() . '/woomoby-wishlist/">Wishlist</a></li><li><a href="'.wp_logout_url(get_permalink()).'">Log out</a></li></ul>';
        // Check if page exists, if not create it
        if (null == get_page_by_title($accountTitle)) {
            $account_page = array(
                'post_name' => $woomobyAccountSlug,
                'post_title' => $accountTitle,
                'post_content' => $accountContent,
                'post_status' => 'publish',
                'post_type' => 'page'
            );
            $woomobyAccountId = wp_insert_post($account_page);
            if (!$woomobyAccountId) {
                wp_die('Error creating template page');
            } else {
                update_post_meta($woomobyAccountId, '_wp_page_template', $accounttemp);
            }
        } // end check if
        
        $wishlisttemp = 'mobileapp-wishlist.php';
        $wishlisttemplate = plugin_dir_path(__FILE__) . $wishlisttemp;
        $destinationwishlist = get_template_directory() . '/' . $wishlisttemp;
        // Check if template exists
        if(locate_template($wishlisttemp)!=''){
        unlink($destinationwishlist);
            copy($wishlisttemplate, $destinationwishlist);
        }else{
           copy($wishlisttemplate, $destinationwishlist);
        }
        
        $woomobyWishId = -1;
        $woomobyWishSlug = 'woomoby-wishlist';
        $wishlistTitle = 'Woomoby Wishlist';
        $wishlistContent = '[yith_wcwl_wishlist]';
        // Check if page exists, if not create it
        if (null == get_page_by_title($wishlistTitle)) {
            $wishlist_page = array(
                'post_name' => $woomobyWishSlug,
                'post_title' => $wishlistTitle,
                'post_content' => $wishlistContent,
                'post_status' => 'publish',
                'post_type' => 'page'
            );
            $woomobyWishId = wp_insert_post($wishlist_page);
            if (!$woomobyWishId) {
                wp_die('Error creating template page');
            } else {
                update_post_meta($woomobyWishId, '_wp_page_template', $wishlisttemp);
            }
        }
        $woomobyPageid = -1;
        $slug = 'woomoby';
        $title = 'Woomoby';
        $content = '';
        // Check if page exists, if not create it
        if (null == get_page_by_title($title)) {
            $uploader_page = array(
                'post_name' => $slug,
                'post_title' => $title,
                'post_content' => $content,
                'post_status' => 'publish',
                'post_type' => 'page'
            );
            $woomobyPageid = wp_insert_post($uploader_page);
            if (!$woomobyPageid) {
                wp_die('Error creating template page');
            } else {
                update_post_meta($woomobyPageid, '_wp_page_template', $pagetemplate);
            }
        } // end check if
        if (!$settings) {
            add_option(self::$settings_options_key, $wm_helpers->settings_default_options());
        }
    }

// Add hook for admin <head></head>

    /**
     * Uninstall Hook
     */
    public static function woomoby_uninstall() {
        $wm_helpers = new CP_wooMoby_Helpers();
        $settings_options = get_option(self::$settings_options_key);

        if ($settings_options['save_settings'] == FALSE) {
            delete_option(self::$settings_options_key);
        }
        $filepath = get_template_directory() . '/';
        $pathcart = $filepath . 'mobileapp-cart.php';
        $pathcheckout = $filepath . 'mobileapp-checkout.php';
        $pathaccount = $filepath . 'mobileapp-account.php';
        $pathwishlist = $filepath . 'mobileapp-wishlist.php';
        $pathmain = $filepath . 'mobileapp-template.php';
        unlink($pathcart);
        unlink($pathcheckout);
        unlink($pathaccount);
        unlink($pathwishlist);
        unlink($pathmain);
        $woomobySlug = get_page_by_path('woomoby');
        $woomobyAccount = get_page_by_path('woomoby-account');
        $woomobyWishlist = get_page_by_path('woomoby-wishlist');
        $woomobyCart = get_page_by_path('woomoby-cart');
        $woomobyCheckout = get_page_by_path('woomoby-checkout');
        wp_delete_post($woomobySlug);
        wp_delete_post($woomobyAccount);
        wp_delete_post($woomobyWishlist);
        wp_delete_post($woomobyCart);
        wp_delete_post($woomobyCheckout);
    }

    /**
     * Deactivate Hook
     */
    public static function woomoby_deactivate() {
        $wm_helpers = new CP_wooMoby_Helpers();
        $settings_options = get_option(self::$settings_options_key);
       
        $filepath = get_template_directory() . '/';
        $pathcart = $filepath . 'mobileapp-cart.php';
        $pathcheckout = $filepath . 'mobileapp-checkout.php';
        $pathaccount = $filepath . 'mobileapp-account.php';
        $pathwishlist = $filepath . 'mobileapp-wishlist.php';
        $pathmain = $filepath . 'mobileapp-template.php';
        unlink($pathcart);
        unlink($pathcheckout);
        unlink($pathaccount);
        unlink($pathwishlist);
        unlink($pathmain);
        $woomobySlug = get_page_by_path('woomoby');
        $woomobyAccount = get_page_by_path('woomoby-account');
        $woomobyWishlist = get_page_by_path('woomoby-wishlist');
        $woomobyCart = get_page_by_path('woomoby-cart');
        $woomobyCheckout = get_page_by_path('woomoby-checkout');
        wp_delete_post($woomobySlug);
        wp_delete_post($woomobyAccount);
        wp_delete_post($woomobyWishlist);
        wp_delete_post($woomobyCart);
        wp_delete_post($woomobyCheckout);
    }
}

CP_wooMoby_Core::woomoby_instance();
require_once dirname(__FILE__) . '/includes/class-tgm-plugin-activation.php';
add_action('wp_ajax_woomoby_sendEmail', 'woomoby_sendEmail');

function woomoby_sendEmail() {
    $response = wp_remote_get('https://woomoby.com/wp-json/woomoby/v2/apikey/1/'. sanitize_text_field($_POST['data']['userToken']).'/'.home_url());
    $response = json_decode($response['body']);
    if (!isset($response->data->status) && !$response->data->status == 404) {
        $toEmail = "samantha@woomoby.com,abu@woomoby.com";
        $message = " Message: " . sanitize_textarea_field($_POST['data']['userContent']);
        $mailHeaders = "From: " . sanitize_user($_POST['data']['userName']) . "<" . sanitize_email($_POST['data']['userEmail']) . ">\r\n";
        if (wp_mail($toEmail, 'App Link', $message, $mailHeaders)) {
            echo "<p class='alert alert-success'>Your app has been submitted successfully!</p>";
        } else {
            echo "<p class='alert alert-danger'>Problem in Sending App to Administrator Resend Your email to " . $toEmail . " .</p>";
        }
    } else {
        echo "<p class='alert alert-danger'>Unable to send message, Please Check your API Key under License tab.</p>";
        exit;
    }
}
add_action('wp_ajax_save_settings', 'woomoby_save_settings');

function woomoby_save_settings() {
    $i = 0;
    $params = array();
    parse_str(intval($_POST['data']), $params);
    update_option('woomobyPagesOrder', ecs_attr($params['item']));
}

add_action('tgmpa_register', 'woomoby_register_required_plugins');

function woomoby_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name' => 'Woocommerce', // The plugin name.
            'slug' => 'woocommerce', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'YITH WooCommerce Wishlist', // The plugin name.
            'slug' => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'OneSignal Push Notifications', // The plugin name.
            'slug' => 'onesignal-free-web-push-notifications', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => '', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        )
    );
    $config = array(
        'id' => 'woomoby', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'plugins.php', // Parent menu slug.
        'capability' => 'manage_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );
    tgmpa($plugins, $config);
}
 // add_action( 'wp_print_scripts', 'woomoby_dequeue_scripts_styles', 100 );
function woomoby_dequeue_scripts_styles(){
    if(is_page(array('woomoby','woomoby-wishlist','woomoby-cart','woomoby-account','woomoby-checkout'))):
    $allowed_scripts = ['wc-admin-coupon-meta-boxes','zoom','wc-single-product','wc-password-strength-meter','wc-lost-password','wc-geolocation','wc-add-to-cart-variation','wc-add-to-cart','wc-credit-card-form','wc-country-select','wc-checkout','wc-cart-fragments','wc-cart','wc-add-payment-method','wc-address-i18n','selectWoo','select2','prettyPhoto-init','prettyPhoto','photoswipe-ui-default','photoswipe','jquery-payment','jquery-cookie','jquery-blockui','js-cookie','html5','woocommerce_settings','wc-users','wc-admin-system-status','wc-api-keys','woocommerce_product_ordering','woocommerce_term_ordering','wc-admin-coupon-meta-boxes','wc-admin-order-meta-boxes','wc-admin-variation-meta-boxes','wc-admin-product-meta-boxes','woocommerce_quick-edit','jquery-ui-autocomplete','jquery-ui-sortable','wc-enhanced-select','iris','woocommerce_admin','woocommerce-tokenization-form','woocommerce','stripe','stripe_checkout','woocommerce_stripe','onesignal','cp-bs-tether','cp-bs-script','cp-ace-script','cp-script','cp-custom-script','cp-custom-slider','jquery'];
    global $wp_scripts; 
    foreach( $wp_scripts->queue as $script ) : 
    if(!in_array($script,$allowed_scripts)){
            wp_deregister_script($script);
            wp_dequeue_script($script);
    }
    endforeach;
    $allowed_styles = ['woocommerce_prettyPhoto_css','select2','photoswipe-default-skin','photoswipe','cp-custom-style','stripe','cp-bs-style','cp-style','cp-all-style','cp-font-awsome','cp-fonts-style','cp-product-slider-style'];
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) :
    if(!in_array($style,$allowed_styles)){
            wp_deregister_style($style);
            wp_dequeue_style($style);
    }   
    endforeach;
    endif;
}