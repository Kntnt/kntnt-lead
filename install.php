<?php

defined( 'WPINC' ) || die;

add_option( 'kntnt-lead', [
	'input_post_types' => [
		'post' => 'post',
	],
	'output_post_types' => [
		'post' => 'post',
	],
	'texturize' => true,
	'html' => '<div class="lead">%s</div>',
	'css' => ".lead {\n\tfont-weight: bold;\n\tfont-style: italic;\n}\n",
] );