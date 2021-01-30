<?php


namespace Kntnt\Lead;


class Insert_HTML {

	public function run() {
		if ( is_singular( Plugin::option( 'output_post_types' ) ) ) {
			add_action( 'the_content', [ $this, 'insert_html' ] );
		}
	}

	public function insert_html( $content ) {

		if ( ( $template = Plugin::option( 'html' ) ) && ( $lead = get_field( 'lead' ) ) ) {

			if ( Plugin::option( 'texturize' ) ) {
				$lead = wptexturize( $lead );
			}

			/**
			 * Filters the HTML added at the beginning of the content.
			 *
			 * @param string $html     The HTML to be added to the content.
			 * @param string $lead     The content of the lead field.
			 * @param string $template The HTML-template from setting page.
			 */
			$html = apply_filters( 'kntnt-lead-html', sprintf( $template, $lead ), $lead, $template );

			$content = $html . $content;

			Plugin::debug( "Added following to the beginning of the content:\n%s", $lead );

		}

		return $content;

	}

}
