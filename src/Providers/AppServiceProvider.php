<?php
namespace App\Providers;

use App\Helpers\WP;

class AppServiceProvider
{
	protected $providers;
	public function __construct()
	{
		$providers = include get_stylesheet_directory() . '/src/config/app.php';
		$this->providers = $providers['providers'];
		$this->boot();

		$this->register();
	}

	public function boot(): void
	{
		foreach ($this->providers as $provider) {
			new $provider();
		}
	}

	protected function register ()
	{
		WP::addStyle('main', WP::getStylesheetUrl() . '/dist/styles/main.css');

		WP::addScript('main', WP::getStylesheetUrl() . '/dist/scripts/main.js');

		WP::enqueueStyles();
		WP::enqueueScripts();
	}
}
