<?php

defined( 'WPINC' ) || die;

add_option( 'kntnt-lead', [
	'input_post_types' => [
		'post' => 'post',
	],
	'output_post_types' => [
		'post' => 'post',
	],
	'html' => '<p class="lead">%s</p>',
	'css' => ".lead {\n\tfont-weight: bold;\n\tfont-style: italic;\n}\n",
	'texturize' => true,
	'excerpt-default' => true,
] );