<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Config;
use Sdk\App;
use Sdk\Middleware\HttpBasicAuth;

$config = new Config();
$app = new App($config);

$users = [
    ['username' => 'test', 'password' => '$2y$12$3W.teM8Ph5cp4CwZy9r0D.MtI.RYLW0kSsYpfvTrBio8tBevQCG2m']
];

$authMiddleware = new HttpBasicAuth($users, 'Please authenticate');

$app->addMiddleware($authMiddleware);

$app->get('/{username}', 'Home::render')
    ?->whereParam('username')
    ->setLimit(2, 32)
    ->setShouldEscape(true);

$app->run();