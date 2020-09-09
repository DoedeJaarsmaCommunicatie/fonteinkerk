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

add_shortcode('woning-table', static function () {
    $context = Timber::get_context();

    $lots = Timber::get_posts(
        [
            'post_type' => 'woning',
            'posts_per_page' => -1,
        ]
    );

    usort($lots, static function ($lot1, $lot2) {
        return $lot1->title <=> $lot2->title;
    });

    $context['lots'] = $lots;

    return Timber::compile(\App\Helpers\Template::partialHtmlTwigFile('shortcodes/woning-table'), $context);
});
