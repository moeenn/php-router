<?php

declare(strict_types=1);

require_once __DIR__ . '/router/main.php';

use SOL5\Router;
use SOL5\Router\HTTP\Request;
use SOL5\Router\HTTP\Status;
use SOL5\Router\HTTP\Response;

$router = new Router();

$router->register('GET', '/', function (Request $request) {
  $data = $request->data(); 
  return new Response($data);
});

$router->register('GET', '/message', function (Request $request) {
  return new Response([
    'id'  => 400,
    'message' => 'The server says hello'
  ], Status::CREATED);
});

$router->register('GET', '/news', function (Request $request) {
  return new Response([
    'item_1'  => 'lorem ipsum',
    'item_2'  => 'delos mae',
  ]);
});

$router->run();