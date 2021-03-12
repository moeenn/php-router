<?php

declare(strict_types=1);

namespace Middleware;

interface MiddlewareInterface {
  public static function process($data);
} 
