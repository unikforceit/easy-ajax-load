<?php

namespace Unikforce\EasyAjaxLoad\Admin;

/**
 * The Menu Handler Class
 */
class Menu {
	
	function __construct() {
		add_action( 'admin_menu', [$this, 'plugin_menus'] );
	}

	public function plugin_menus() {
		add_menu_page( __('Easy Ajax Load', 'easy-ajax-load'), __('Easy Ajax Load', 'easy-ajax-load'), 'manage_options', 'easy-ajax-load', [$this, 'plugin_page'], 'dashicons-image-rotate' );
	}

	public function plugin_page() {
		echo 'Hello';
	}
}