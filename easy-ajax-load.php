<?php
/**
 * Plugin Name: Easy Ajax Load
 * Description: This is complete ajax solution for wordpress.
 * Plugin URI: https://wordpress.org/easy-ajax-load/
 * Author: UnikForce
 * Author URI: http://unikforce.com
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: easy-ajax-load
 */

if (!defined('ABSPATH')) {
	exit;
}


require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin calss
 */
final class Easy_Ajax_Load {

	/**
	 * Version of plugins
	 *
	 * @var string
	 */
	const version = '1.0.0';

	/**
	 * Class constructor
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, [$this, 'activate'] );

		add_action( 'plugins_loaded', [$this, 'init_plugins'] );
	}

	/**
	 * Initialize a single instance
	 *
	 * @return \Easy_Ajax_Load
	 */
	public static function init() {
		static $instance = false;

		if(!$instance) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define all constant
	 */
	public function define_constants() {
		define('EASY_AJAX_LOAD_VERSION', self::version);
		define('EASY_AJAX_LOAD_FILE', __FILE__);
		define('EASY_AJAX_LOAD_PATH', __DIR__);
		define('EASY_AJAX_LOAD_URL', plugins_url( '', EASY_AJAX_LOAD_FILE ));
		define('EASY_AJAX_LOAD_ASSETS', EASY_AJAX_LOAD_URL . '/assets');
	}

	/**
	 * Initialize the plugins
	 * 
	 * @return void
	 */
	public function init_plugins() {
		if (is_admin()) {
			new Unikforce\EasyAjaxLoad\Admin();
		}else{
			new Unikforce\EasyAjaxLoad\Frontend();
		}
	}

	/**
	 * Do things on activate
	 *
	 * @return void
	 */
	public function activate() {
		$installed = get_option( 'easy_ajax_load_installed' );

		if (!$installed) {
			update_option( 'easy_ajax_load_installed', time() );
		}

		update_option( 'easy_ajax_load_version', EASY_AJAX_LOAD_VERSION);
	}
}

/**
 * Initialize the main plugins
 *
 * @return \Easy_Ajax_Load
 */
function Easy_Ajax_Load() {
	return Easy_Ajax_Load::init();
}

// Run the plugins
Easy_Ajax_Load();