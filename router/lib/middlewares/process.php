<?php

declare(strict_types=1);

namespace SOL5\Router\Middleware;
require_once __DIR__ . '/../Interfaces.php';

use SOL5\Router\Middleware\MiddlewareInterface;

class Process implements MiddlewareInterface
{
  public static function process($data)
  {
    return [
      'type'  => 'modified',
      'data'  => $data,
    ];
  } 
}