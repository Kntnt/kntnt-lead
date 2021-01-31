<?php

namespace Kntnt\Lead;

class Generate_Excerpt {

	public function run() {
		if ( Plugin::option( 'excerpt-default' ) ) {
			remove_filter( 'get_the_excerpt', 'wp_trim_excerpt', 10 );
			add_filter( 'get_the_excerpt', [ $this, 'get_the_excerpt' ], 10, 2 );
			Plugin::debug( 'Manages default excerpt.' );
		}
	}

	public function get_the_excerpt( $excerpt, $post ) {
		if ( in_array( $post->post_type, Plugin::option( 'input_post_types' ) ) ) {
			Plugin::debug( 'Managed excerpt for post type %s.', $post->post_type );
			return $this->trim_excerpt( $excerpt, $post );
		}
		else {
			Plugin::debug( 'Standard default excerpt for post type %s.', $post->post_type );
			return wp_trim_excerpt( $excerpt, $post );
		}
	}

	private function trim_excerpt( $excerpt, $post ) {

		if ( '' == $excerpt ) {
			Plugin::debug( 'No had-crafted excerpt provided for post with id = %s. Default to lead.', $post->ID );
			$excerpt = get_field( 'lead', $post );
		}

		if ( '' == $excerpt ) {
			Plugin::debug( 'Lead is empty, default to first paragraph.' );
			$excerpt = get_the_content( '', false, $post );
			$excerpt = strip_shortcodes( $excerpt );
			$excerpt = excerpt_remove_blocks( $excerpt );
			$excerpt = apply_filters( 'the_content', $excerpt );
			$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
			$excerpt = substr( $excerpt, 0, strpos( $excerpt, '</p>' ) + 4 );
			$excerpt = wp_strip_all_tags( $excerpt, true );
			$excerpt = apply_filters( 'wp_trim_excerpt', $excerpt, '' );
		}

		return $excerpt;

	}

}
