<?php
/**
 * Codingpixel 
 *
 * @author  Codingpixel
 * @link    http://codingpixel.com
*/
if ( ! defined( 'WPINC' ) ) die;
if ( ! class_exists( 'CP_wooMoby_Helpers' ) ) die;	
class CP_wooMoby_Helpers {
	public function __construct() {
	}
	/**
	 * Default options for settings
	*/
	function settings_default_options() {
		
		$options = array(
			'enable_wooMoby'	=> 1,
			'enable_tablet'		=> 1,
			'enable_store_only'     => 0,		
			'save_settings' 	=> 1,
			'site_logo' 		=> '',
                        'header_menu' 	=> '',
			'site_name' 		=> get_bloginfo('name'),
			'enable_toolbar'	=> 1,
			'enable_left_panel'	=> 0,
			'enable_rtl' 		=> 0,
			'clean_head'		=> 1,
                        'grid_items'            => 8,
                        'footer_copyright'	=> '&copy; '.date('Y').' '.get_bloginfo('name'),
                        'footer_menu'           => '',

			'theming' => array(
				'other_devices' 		=> 'woomoby'
				
			),

			'home_slider' => array(
				'one'=> array(
					'img'	=> '',
					'url'	=> ''
				),
				'two'=> array(
					'img'	=> '',
					'url'	=> ''
				),
				'three'=> array(
					'img'	=> '',
					'url'	=> ''
				)	
			),

			'favicon' => array(
				'url' => '',
				'name' => ''
			),

			'color_scheme' => array(	
				'body_bg'		=> '#ffffff',
				'primary' 		=> '#ffffff',
				'links' 		=> '#0eb698',
				'address_bar' 		=> '#ffffff',
				'navbar_bg' 		=> '#000000',
				'navbar_text' 		=> '#000000',
				'button_bg' 		=> '#0eb698',
				'button_text'		=> '#ffffff',
				'cart_badge_bg'		=> '#E91E63',
				'cart_badge_text'	=> '#ffffff',
				'label_bg' 		=> '#E91E63',
				'label_text' 		=> '#ffffff'
			),

			'catalog' => array(
				'listing_layout'	=> 'list',
				'add_to_cart'		=> 1,
			),

			'single_product' => array(
				'enable_related'	=> 1,
				'enable_reviews'	=> 0
			),

			'cart' => array(
				'enable_coupons' 	=> 1,
				'enable_cart_totals'	=> 1,
				'toolbar_navigation'	=> 1
			),

			'account' => array(
				'dashboard_layout'	=> 'list'
			),

			'checkout' => array(
				'toolbar_navigation'	=> 1
			),

			'category' => array(
				'layout'	=> 'cards'
			),

			'custom_code' => array(
				'js'		=> '',
				'analytics'	=> ''
			),

			'homepage' => array(
				'slot_one'		=> 'slider',
				'slot_two'		=> 'hscroll_new',
				'slot_three'            => 'grid_best',
				'slot_four'		=> ''
			)
		);

		return $options;
	}


	/**
	 * Use WordPress Image editor to manipulate an image
	*/
	function image_editor( $method, $file, $resize_sizes = NULL) {
		$image = wp_get_image_editor( $file );

		// Resize method
		if ( $method = 'resize') {
			if ( ! is_wp_error( $image ) ) {
				$resize = $image->multi_resize( $resize_sizes );
				return $resize;
			} else {
				return false;
			}
		}

		return;
	}

    /**
     * Delete a directory
     * Download a a directory and all files
     * @param dir_path - path to the directory
    */
	function delete_dir( $dir_path ) {
		if( is_dir($dir_path) ) {

		    if (substr($dir_path, strlen($dir_path) - 1, 1) != '/') {
		        $dir_path .= '/';
		    }

		    $files = glob($dir_path . '*', GLOB_MARK);
		    foreach ($files as $file) {
		        if (is_dir($file)) {
		            self::delete_dir($file);
		        } else {
		            unlink($file);
		        }
		    }
		    rmdir($dir_path);
		}
	}

}