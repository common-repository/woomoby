<?php

/**
 *
 * @author  Codingpixel
 * @link    http://codingpixel.com
 */
if (!defined('WPINC'))
    die;
if (!class_exists('CP_wooMoby_Settings'))
    die;

class CP_wooMoby_Settings {

    protected static $instance = null;

    public function __construct() {
        $this->globals = CP_wooMoby_Core::woomoby_instance();

        add_action('admin_head', array($this, 'hook_css'));
        add_action('init', array($this, 'left_panel_menu'));
        add_action('wp_ajax_cp_settings_action', array($this, 'ajax_settings_process'));
        add_action('wp_ajax_cp_images_action', array($this, 'ajax_image_process'));
    }

    /**
     * Set Instance
     */
    public static function instance() {
        if (self::$instance == null)
            self::$instance = new self;
        return self::$instance;
    }

    /**
     * Register Left Panel menu
     */
    public function left_panel_menu() {
        register_nav_menu('woomoby-menu', __('wooMoby Menu', 'woomoby'));
    }
    /**
     * Ajax save settings option
     */
    public function ajax_settings_process() {
        // Check Nonce
        //print_r(json_decode($_POST['menu_items'])); exit;
        if (!isset($_POST['cp_settings_nonce']) || !wp_verify_nonce($_POST['cp_settings_nonce'], 'cp_settings_action'))
            die('Permission Denied');
        $settings_options = get_option($this->globals['settings_options_key']);

        $settings_options['enable_woomoby'] = (int) $_POST["enable_woomoby"];
        $settings_options['enable_tablet'] = (int) $_POST["enable_tablet"];
        $settings_options['save_settings'] = (int) $_POST["save_settings"];
        $settings_options['footer_copyright'] = wp_strip_all_tags(trim($_POST["footer_copyright"]));
        $settings_options['enable_rtl'] = (int) $_POST["enable_rtl"];
        $settings_options['grid_items'] = (int) $_POST["grid-items"];
        $settings_options['apikey_woomoby'] = wp_strip_all_tags($_POST["apikey_woomoby"]);
        //$settings_options['enable_store_only']    = (int)$_POST["enable_store_only"];
         if(isset($_POST['menu_items'])&&($_POST['menu_items']!="")){
            $array = serialize(array_filter($_POST['menu_items']));
            $settings_options['header_menu'] = serialize(array_filter(json_decode($_POST['menu_items'])));
        }else{
        $settings_options['header_menu'] = serialize(wp_strip_all_tags(json_decode($_POST["header_menu"])));
        }
        //$settings_options['header_menu'] = serialize(wp_strip_all_tags($_POST["header_menu"]));
        $settings_options['site_name'] = wp_strip_all_tags(trim($_POST["site_name"]));
        $settings_options['enable_toolbar'] = (int) $_POST["enable_toolbar"];
        $settings_options['enable_left_panel'] = (int) $_POST["enable_left_panel"];
        $settings_options['clean_head'] = (int) $_POST["opt_clean_head"];

        $settings_options['theming']['other_devices'] = wp_strip_all_tags($_POST["theming-other-devices"]);

        $settings_options['catalog']['add_to_cart'] = (int) $_POST["catalog-add_to_cart"];
        $settings_options['catalog']['listing_layout'] = wp_strip_all_tags($_POST["catalog-listing_layout"]);

        $settings_options['single_product']['enable_related'] = (int) $_POST["single_product-enable_related"];
        $settings_options['single_product']['enable_reviews'] = (int) $_POST["single_product-enable_reviews"];

        $settings_options['cart']['enable_coupons'] = (int) $_POST["cart-enable_coupons"];
        $settings_options['cart']['enable_cart_totals'] = (int) $_POST["cart-enable_cart_totals"];
        $settings_options['cart']['toolbar_navigation'] = (int) $_POST["cart-toolbar_navigation"];

        $settings_options['checkout']['toolbar_navigation'] = (int) $_POST["checkout-toolbar_navigation"];

        $settings_options['account']['dashboard_layout'] = wp_strip_all_tags($_POST["account-dashboard_layout"]);

        $settings_options['category']['layout'] = wp_strip_all_tags($_POST["category-layout"]);

        $settings_options['custom_code']['js'] = wp_strip_all_tags(trim($_POST["custom_js"]));
        $settings_options['custom_code']['analytics'] = wp_strip_all_tags(trim($_POST["analytics_code"]));

        $settings_options['color_scheme']['body_bg'] = wp_strip_all_tags($_POST["color-body_bg"]);
        $settings_options['color_scheme']['primary'] = wp_strip_all_tags($_POST["color-primary"]);
        $settings_options['color_scheme']['links'] = wp_strip_all_tags($_POST["color-links"]);
        $settings_options['color_scheme']['address_bar'] = wp_strip_all_tags($_POST["color-address_bar"]); 
        $settings_options['color_scheme']['navbar_bg'] = wp_strip_all_tags($_POST["color-navbar_bg"]);
        $settings_options['color_scheme']['navbar_text'] = wp_strip_all_tags($_POST["color-navbar_text"]);
        $settings_options['color_scheme']['button_bg'] = wp_strip_all_tags($_POST["color-button_bg"]);
        $settings_options['color_scheme']['button_text'] = wp_strip_all_tags($_POST["color-button_text"]);
        $settings_options['color_scheme']['cart_badge_bg'] = wp_strip_all_tags($_POST["color-cart_badge_bg"]);
        $settings_options['color_scheme']['cart_badge_text'] = wp_strip_all_tags($_POST["color-cart_badge_text"]);
        $settings_options['color_scheme']['label_bg'] = wp_strip_all_tags($_POST["color-label_bg"]);
        $settings_options['color_scheme']['label_text'] = wp_strip_all_tags($_POST["color-label_text"]);

        $settings_options['home_slider']['one']['url'] = esc_url($_POST["home_slider_one_link"]);
        $settings_options['home_slider']['two']['url'] = esc_url($_POST["home_slider_two_link"]);
        $settings_options['home_slider']['three']['url'] = esc_url($_POST["home_slider_three_link"]);

        $settings_options['homepage']['slot_one'] = wp_strip_all_tags($_POST["homepage-slot_one"]);
        $settings_options['homepage']['slot_two'] = wp_strip_all_tags($_POST["homepage-slot_two"]);
        $settings_options['homepage']['slot_three'] = wp_strip_all_tags($_POST["homepage-slot_three"]);
        $settings_options['homepage']['slot_four'] = wp_strip_all_tags($_POST["homepage-slot_four"]);

        $do_change = update_option($this->globals['settings_options_key'], $settings_options);

        if (!empty(wp_strip_all_tags($_POST['custom-notification']))) {
            $message = wp_strip_all_tags($_POST['custom-notification']);
            $settings = get_option('OneSignalWPSetting');
            $appid = $settings['app_id'];
            $restapikey = $settings['app_rest_api_key'];
            $content = array(
                "en" => $message
            );
            $fields = array(
                'app_id' => "$appid",
                'included_segments' => array('All'),
                'data' => array("foo" => "bar"),
                'contents' => $content
            );
            $fields = json_encode($fields);
            $args = array(
                'body' => $fields,
                'timeout' => '5',
                'redirection' => '5',
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array('Content-Type' => 'application/json; charset=utf-8', 'Authorization' => 'Basic ' . $restapikey),
                'cookies' => array()
            );
            $response = wp_remote_post('https://onesignal.com/api/v1/notifications', $args);
            // $fields = json_encode($fields);
            // print_r($response);
            $return["allresponses"] = $response;
            $return = json_encode($return);
        }

        $result = array();
        $phoneScreenHtml = '';
        $pageID = get_page_by_path('woomoby');
        $result['previewSection'] = get_the_permalink($pageID);
        if ($settings_options['homepage']['slot_four'] == "")
            $slot4 = "Empty";
        else
            $slot4 = str_replace('_', ' ', $settings_options['homepage']['slot_four']);
        if ($do_change) {
            $phoneScreenHtml = '<div class="screen-wrap"><div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_one">Click to select<br>Selected Section:' . str_replace('_', ' ', $settings_options['homepage']['slot_one']) . '</div></div>'
                    . '<div class="screen-wrap"><div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_two">Click to select<br>Selected Section:' . str_replace('_', ' ', $settings_options['homepage']['slot_two']) . '</div></div>'
                    . '<div class="screen-wrap"><div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_three">Click to select<br>Selected Section:' . str_replace('_', ' ', $settings_options['homepage']['slot_three']) . '</div></div>'
                    . '<div class="screen-wrap"><div class="builder-select small-height" data-toggle="modal" data-target="#homepage_layout_four">Click to select<br>Selected Section:' . $slot4 . '</div></div>';

            $result['phoneScreen'] = $phoneScreenHtml;
            $result['apikey'] = $settings_options['apikey_woomoby'];
        } else {
            echo "failed";
            die();
        }

        echo json_encode($result);
        die();
    }

    /**
     * Ajax upload images
     */
    public function ajax_image_process() {
        // Check Nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cp_images_nonce'))
            die('Permission Denied');

        $settings_options = get_option($this->globals['settings_options_key']);

        $upload_dir = wp_upload_dir();
        $date_format = date('Y/m', strtotime($_POST["file_date"]));

        // We are doing an image upload
        if (wp_strip_all_tags($_POST['method']) == 'upload') {

            // Site logo
            if (wp_strip_all_tags($_POST['input_name']) == 'site_logo') {
                $settings_options['site_logo'] = esc_url(wp_strip_all_tags($_POST["file_url"]));
                update_option($this->globals['settings_options_key'], $settings_options);

                die();
            }

            // Favicons
            if (wp_strip_all_tags($_POST['input_name']) == 'favicon') {
                $file = '' . $upload_dir['basedir'] . '/' . $date_format . '/' . wp_strip_all_tags($_POST["file_name"]);
                $raw_filename = pathinfo($file, PATHINFO_FILENAME);

                $settings_options['favicon']['url'] = $upload_dir['baseurl'] . '/' . $date_format . '/';
                $settings_options['favicon']['name'] = $raw_filename;

                update_option($this->globals['settings_options_key'], $settings_options);

                // resize the image
                $sizes_array = array(
                    array('width' => 16, 'height' => 16, 'crop' => false),
                    array('width' => 32, 'height' => 32, 'crop' => false),
                    array('width' => 57, 'height' => 57, 'crop' => false),
                    array('width' => 60, 'height' => 60, 'crop' => false),
                    array('width' => 72, 'height' => 72, 'crop' => false),
                    array('width' => 76, 'height' => 76, 'crop' => false),
                    array('width' => 96, 'height' => 96, 'crop' => false),
                    array('width' => 114, 'height' => 114, 'crop' => false),
                    array('width' => 120, 'height' => 120, 'crop' => false),
                    array('width' => 144, 'height' => 144, 'crop' => false),
                    array('width' => 152, 'height' => 152, 'crop' => false),
                    array('width' => 180, 'height' => 180, 'crop' => false),
                    array('width' => 192, 'height' => 192, 'crop' => false)
                );


                $this->helpers = new CP_wooMoby_Helpers();

                $this->helpers->image_editor($method = 'resize', $file, $sizes_array);

                die();
            }

            echo wp_strip_all_tags($_POST['input_name']);


            // Home Slider One
            if (wp_strip_all_tags($_POST['input_name']) == 'home_slider_one') {
                $settings_options['home_slider']['one']['img'] = esc_url(wp_strip_all_tags($_POST["file_url"]));
                update_option($this->globals['settings_options_key'], $settings_options);

                die();
            }

            // Home Slider Two
            if (wp_strip_all_tags($_POST['input_name']) == 'home_slider_two') {
                $settings_options['home_slider']['two']['img'] = esc_url(wp_strip_all_tags($_POST["file_url"]));
                update_option($this->globals['settings_options_key'], $settings_options);

                die();
            }

            // Home Slider Three
            if (wp_strip_all_tags($_POST['input_name']) == 'home_slider_three') {
                $settings_options['home_slider']['three']['img'] = esc_url(wp_strip_all_tags($_POST["file_url"]));
                update_option($this->globals['settings_options_key'], $settings_options);

                die();
            }
        }
        // we are deleting an image
        else if ($_POST['method'] == 'delete') {
            $file_url = $settings_options[wp_strip_all_tags($_POST["input_name"])];

            if (wp_strip_all_tags($_POST["input_name"]) == "site_logo") {
                $settings_options[wp_strip_all_tags($_POST["input_name"])] = '';
            } else if (wp_strip_all_tags($_POST["input_name"]) == "favicon") {
                $favicon = $settings_options[wp_strip_all_tags($_POST["input_name"])];
                $file_url = $favicon['url'] . '' . $favicon['name'] . '.png';

                // reset options
                $settings_options['favicon']['url'] = '';
                $settings_options['favicon']['name'] = '';
            } else if (wp_strip_all_tags($_POST["input_name"]) == "home_slider_one") {
                $settings_options['home_slider']['one']['img'] = '';
            } else if (wp_strip_all_tags($_POST["input_name"]) == "home_slider_two") {
                $settings_options['home_slider']['two']['img'] = '';
            } else if (wp_strip_all_tags($_POST["input_name"]) == "home_slider_three") {
                $settings_options['home_slider']['three']['img'] = '';
            }

            update_option($this->globals['settings_options_key'], $settings_options);
        }

        die();
    }

    /**
     * Fixed the navbar icon
     */
    public function hook_css() {
        $output = "<style>#adminmenu #toplevel_page_cp-woomoby .wp-menu-image img{padding-top:5px!important}</style>";
        echo $output;
    }

}

CP_wooMoby_Settings::instance();
