<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Config;
use Sdk\App;

$config = new Config();
$app = new App($config);

$app->get('/{username}', 'Home::render')
	?->whereParam('username')
	->setLimit(2, 32)
	->setShouldEscape(true);

$app->run();