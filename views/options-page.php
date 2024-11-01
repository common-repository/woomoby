<?php
$settings_options = get_option( $this->globals['settings_options_key'] );
$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'settings';

	if ( $current_tab == 'settings' ) {
	    include_once( $this->globals['plugin_path'] . 'views/page-settings.php' );
	} 
