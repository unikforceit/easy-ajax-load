<?php

namespace Unikforce\EasyAjaxLoad\Frontend;

/**
 * Shortcode Handler Class
 */
class Shortcode {
	
	function __construct() {
		add_shortcode( 'easy-ajax-load', [$this, 'render_shortcode'] );
	}

	/**
	 * Shortcode handler Class
	 * @param  array $atts
	 * @param  string $content
	 * @return string
	 */
	public function render_shortcode($atts, $content = '') {
		return 'Hello I am from Shortcode';
	}
}