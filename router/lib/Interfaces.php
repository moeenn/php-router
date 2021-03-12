<?php

declare(strict_types=1);

namespace SOL5\Router\Middleware;

interface MiddlewareInterface {
  public static function process($data);
} 
