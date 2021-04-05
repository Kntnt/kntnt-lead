<?php


namespace Kntnt\Lead;


class Load_ACF {

	private static function fields() {
		return [
			'key' => 'group_606717c5dbc71',
			'title' => 'Lead',
			'fields' => [
				[
					'key' => 'field_606717f9f48f3',
					'label' => '',
					'name' => 'lead',
					'type' => 'textarea',
					'instructions' => __( '<b>Lead:</b> Paragraph shown before the body. It typically summarizes the content and stimulate further reading. This text is also used as an excerpt if the manual excerpt box is left blank.', 'kntnt-lead' ),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => [
						'width' => '',
						'class' => '',
						'id' => '',
					],
					'default_value' => '',
					'placeholder' => 'Add lead paragraph',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				],
			],
			'location' => self::locations(),
			'menu_order' => 50,
			'position' => 'acf_after_title',
			'style' => 'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'field',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		];
	}

	public function run() {
		acf_add_local_field_group( self::fields() );
	}

	private static function locations() {
		$locations = [];
		foreach ( Plugin::option( 'input_post_types' ) as $post_type ) {
			$locations[] = [
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => $post_type,
				],
			];
		}
		Plugin::debug( 'ACF locations: %s', $locations );
		return $locations;
	}

}