<?php


namespace Kntnt\Lead;


class Add_Shortcode {

	public function run() {
		add_shortcode( 'kntnt-lead', [ $this, 'shortcode' ] );
	}

	public function shortcode( $atts, $content = '' ) {
		$lead = get_field( 'lead' );
		if ( $lead ) {
			$defaults = [ 'texturize' => Plugin::option( 'texturize' ) ? 'on' : 'off' ];
			$atts = Plugin::shortcode_atts( $defaults, $atts, 'kntnt-lead' );
			if ( 'on' == strtolower( $atts['texturize'] ) ) {
				$lead = wptexturize( $lead );
			}
			Plugin::debug( "Added following with [kntnt-lead texturize=\"%s\"]:\n%s", $atts['texturize'], $lead );
		}
		return $lead;
	}

}