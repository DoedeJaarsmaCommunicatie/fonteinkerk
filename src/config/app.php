<?php
namespace App;

use App\Providers\MenuServiceProvider;
use App\Providers\ContentServiceProvider;

return [
	'providers'     => [
	    MenuServiceProvider::class,
		ContentServiceProvider::class
    ]
];
