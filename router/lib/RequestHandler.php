<?php

declare(strict_types=1);

namespace SOL5;
require_once __DIR__ . '/Request.php';

use SOL5\Router\HTTP\Request;
use SOL5\Router\HTTP\Response;
use \Closure;

class RequestHandler
{
  private string $m_URL;
  private string $m_method;
  private $m_callback;
  private array $m_allowed_methods = ['GET', 'POST', 'PUT', 'DELETE'];

  public function __construct(string $method, string $URL, Closure $callback)
  {
    $method = trim(strtoupper($method));

    if (!in_array($method, $this->m_allowed_methods)) {
      throw new \Exception('Invalid Method type');
    }

    $this->m_method = $method;
    $this->m_URL = $URL;
    $this->m_callback = $callback;
  }

  /**
   *  return private properties
   * 
  */
  public function URL(): string
  {
    return $this->m_URL;
  }

  public function method(): string
  {
    return $this->m_method;
  }

  /**
   *  execute the route handler callback
   * 
  */
  public function dispatch(): Response
  {
    $func = $this->m_callback;
    $request = new Request;
    return $func($request);
  }
} 
