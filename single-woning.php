<?php

use Timber\Post;
use Timber\Timber;
use Timber\Helper;
use Timber\PostQuery;
use App\Helpers\Template;

defined('ABSPATH') || exit(0);

/**
 * @param Post $post
 *
 * @return false
 */
function getCachedNextOrFalse($post) {
	$current_lot = (int) $post->post_title;

	if ($current_lot === 19) {
		return false;
	}

	return Helper::transient("post_{$current_lot}_next_post", function () use ($current_lot) {
		$next_lot = ++$current_lot;

		$query = new PostQuery([
			'name' => $next_lot,
			'post_type' => 'woning'
		]);

		return $query->get_posts()[0]?? false;
	});
}
function getCachedPrevOrFalse($post) {
	$current_lot = (int) $post->post_title;

	if ($current_lot === 1) {
		return false;
	}

	return Helper::transient("post_{$current_lot}_prev_post", static function () use ($current_lot) {
		$next_lot = --$current_lot;

		$query = new PostQuery([
			'name' => $next_lot,
			'post_type' => 'woning'
		]);

		return $query->get_posts()[0]?? false;
	});
}

$context = Timber::get_context();
$context['post'] = new Post();
$context['next'] = getCachedNextOrFalse($context['post']);
$context['prev'] = getCachedPrevOrFalse($context['post']);
$context['can_check_price'] = true;

$templates = [
	Template::viewHtmlTwigFile('single/woning')
];

return Timber::render(
	apply_filters('fonk/page-controllers/single/woning/templates', $templates),
	apply_filters('fonk/page-controllers/single/woning/context', $context),
	apply_filters('fonk/page-controllers/single/woning/cache', false)
);
