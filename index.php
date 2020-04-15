<?php

use Timber\Post;
use Timber\Timber;

$context         = Timber::get_context();
$context['post'] = new Post();

$templates = ['views/page.html.twig'];

if (class_exists('\Elementor\Plugin')) {
	if (\Elementor\Plugin::$instance->db->is_built_with_elementor($context['post']->id)) {
		array_unshift($templates, 'views/page-no-elementor.html.twig');
	}
}

return Timber::render(
	apply_filters('fonk/page-controllers/index/templates', $templates),
    apply_filters('fonk/page-controllers/index/context', $context),
	apply_filters('fonk/page-controllers/index/cache', [false, false])
);
