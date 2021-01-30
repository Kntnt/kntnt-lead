<?php


namespace Kntnt\Lead;


class Load_ACF {

	private static function fields() {
		return [
			'key' => 'group_59b2b0f8bb543',
			'title' => 'Ingress',
			'fields' => [
				[
					'key' => 'field_595fa5d61b6f5',
					'label' => __( 'Lead', 'kntnt-lead' ),
					'name' => 'lead',
					'type' => 'textarea',
					'instructions' => __( 'The lead appears before the body text. The lead is also used as an excerpt if the manual excerpt box is left blank.', 'kntnt-lead' ),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => [
						'width' => '',
						'class' => '',
						'id' => '',
					],
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				],
			],
			'location' => self::locations(),
			'menu_order' => 10,
			'position' => 'acf_after_title',
			'style' => 'seamless',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
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