<?php


namespace Kntnt\Lead;


class Load_CSS {

	public function run() {
		if ( is_singular( Plugin::option( 'output_post_types' ) ) ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'load_css' ] );
		}
	}

	public function load_css() {
		if ( ( $css_file_info = Plugin::option( 'css_file_info' ) ) && $css_file_info['url'] ) {
			wp_enqueue_style( 'kntnt-lead', $css_file_info['url'], [], (string) $css_file_info['modified'] );
			Plugin::debug( 'Enqueued %s.', $css_file_info['url'] );
		}
	}

}
