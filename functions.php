<?php
use Timber\Timber;

include_once get_stylesheet_directory() . '/vendor/autoload.php';

add_theme_support('custom-logo');

Timber::$locations = [
    get_stylesheet_directory() . '/templates/',
];

if (is_admin_bar_showing() || is_admin()) {
	Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/DoedeJaarsmaCommunicatie/fonteinkerk',
		__FILE__,
		'fonteinkerk'
	);
}
