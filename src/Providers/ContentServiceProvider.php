<?php

namespace App\Providers;

use PostTypes\PostType;

class ContentServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->registerPostTypes();
	}

	private function registerPostTypes() {
		$lot = new PostType([
			'name'     => 'woning',
			'singular' => 'Woning',
			'plural'   => 'Woningen',
			'slug'     => 'woningen',
		]);

		$lot->register();
	}
}
