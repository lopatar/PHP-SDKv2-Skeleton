<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Sdk\Http\Request;
use Sdk\Http\Response;

final class Home
{
	public static function render(Request $request, Response $response, array $args): Response
	{
		$username = $args['username'];
		$model = new User($username);

		$response->createView('Home.php')
			?->setProperty('user', $model);
		return $response;
	}
}