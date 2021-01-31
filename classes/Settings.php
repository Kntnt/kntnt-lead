<?php

namespace Kntnt\Lead;

class Settings extends Abstract_Settings {

	protected function menu_title() {
		return __( 'Kntnt Lead', 'kntnt-lead' );
	}

	protected function fields() {

		$fields['input_post_types'] = [
			'type' => 'checkbox group',
			'label' => __( "Enabled field", 'kntnt-lead' ),
			'description' => __( 'A text area for writing a lead is added to the edit screen of select post types. The lead can be inserted with the shortcodes <code>[kntnt-lead]</code>.', 'kntnt-lead' ),
			'options' => wp_list_pluck( get_post_types( [ 'public' => true ], 'objects' ), 'label' ),
			'default' => [ 'post' ],
		];

		$fields['output_post_types'] = [
			'type' => 'checkbox group',
			'label' => __( "Enabled output", 'kntnt-lead' ),
			'description' => __( 'Leads are added to top of the content of selected post types if HTML is provide below.', 'kntnt-lead' ),
			'options' => wp_list_pluck( get_post_types( [ 'public' => true ], 'objects' ), 'label' ),
			'default' => [ 'post' ],
			'validate' => function ( $output_post_types, $opt ) {
				return ! array_diff( $output_post_types, $opt['input_post_types'] );
			},
		];

		$fields['html'] = [
			'type' => 'text area',
			'label' => __( "Output HTML", 'kntnt-lead' ),
			'description' => __( 'HTML with <code>%s</code> as placeholder for the plain lead text. It\'s used for leads inserted above body text, but not by <code>[kntnt-lead]</code>. ', 'kntnt-lead' ),
			'rows' => 8,
			'cols' => 80,
			'default' => '<p class="lead">%s</p>',
		];

		$fields['css'] = [
			'type' => 'text area',
			'label' => __( "Output CSS", 'kntnt-lead' ),
			'description' => __( 'CSS that should be included when the above HTML is used.', 'kntnt-lead' ),
			'rows' => 8,
			'cols' => 80,
			'default' => ".lead {\n\tfont-weight: bold;\n\tfont-style: italic;\n}\n",
		];

		$fields['texturize'] = [
			'type' => 'checkbox',
			'label' => __( "Texturize", 'kntnt-lead' ),
			'description' => __( "Transform quotes, apostrophes, dashes, ellipses and more to typography ditto.<br>It's used both when a lead is inserted with HTML and by the shortcode <code>[kntnt-lead]</code> without the attribute <code>texturize</code>, which can take the values <code>on</code> and <code>off</code>.", 'kntnt-lead' ),
			'default' => true,
		];

		$fields['excerpt-default'] = [
			'type' => 'checkbox',
			'label' => __( "Default excerpt", 'kntnt-lead' ),
			'description' => __( 'Use lead as default for excerpts, and the first paragraph of the body text if the lead is empty.', 'kntnt-lead' ),
			'default' => true,
		];

		$fields['submit'] = [
			'type' => 'submit',
		];

		return $fields;

	}

	protected final function actions_after_saving( $opt, $fields ) {
		if ( $opt['html'] && $opt['css'] ) {
			$info = Plugin::save_to_file( $opt['css'], 'css' );
			Plugin::set_option( 'css_file_info', $info );
		}
		else if ( $css_file_info = Plugin::option( 'css_file_info' ) ) {
			@unlink( $css_file_info['file'] );
			Plugin::delete_option( 'css_file_info' );
			Plugin::debug( 'Deleted "%s".', $css_file_info['file'] );
		}
	}

}
