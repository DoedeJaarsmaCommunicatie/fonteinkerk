<?php

defined('ABSPATH') || exit(0);

$context = \Timber\Timber::get_context();
$context['post'] = new \Timber\Post();

$templates = [
	\App\Helpers\Template::viewHtmlTwigFile('single/woning')
];

return \Timber\Timber::render(
	apply_filters('fonk/page-controllers/single/woning/templates', $templates),
	apply_filters('fonk/page-controllers/single/woning/context', $context),
	apply_filters('fonk/page-controllers/single/woning/cache', false)
);
