<?php


namespace Kntnt\Lead;


final class Plugin extends Abstract_Plugin {

	use Logger;
	use Options;
	use File_Save;
	use Shortcodes;
	use Dependency_Check;

	private static $classes = [
		'any' => [
			'init' => [
				'Load_ACF',
				'Generate_Excerpt',
				'Add_Shortcode',
			],
		],
		'public' => [
			'wp' => [
				'Insert_HTML',
				'Load_CSS',
			],
		],
		'admin' => [
			'init' => [
				'Settings',
			],
		],
	];

	private static $dependencies = [
		'plugins' => [
			[
				'advanced-custom-fields/acf.php' => 'Advanced Custom Fields',
				'advanced-custom-fields-pro/acf.php' => 'Advanced Custom Fields Pro',
			],
		],
	];

	public static function dependencies() {
		return self::$dependencies;
	}

	public function classes_to_load() {
		return self::is_dependencies_satisfied() ? self::$classes : [];
	}

}
