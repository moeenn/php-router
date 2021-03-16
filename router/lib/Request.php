<?php

declare(strict_types=1);

namespace SOL5\Router\HTTP;
use \Exception;

class Request
{
  private string $m_URL;
  private string $m_method;
  private string $m_body;
  private array $m_query;

  function __construct()
  {
    $this->m_URL = $_SERVER['REQUEST_URI'];
    $this->m_method = $_SERVER['REQUEST_METHOD'];
    $this->m_query = $this->parseQueryString();
    $this->m_body = file_get_contents('php://input');
  }

  private function parseQueryString(): array
  {
    $rawString = $_SERVER['QUERY_STRING'];
    if (!isset($rawString)) return [];

    $result = [];

    parse_str($rawString, $result);

    /**
     *  sanitize inputs by encoding special characters
    */
    foreach ($result as $key => &$value) {
      $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    return $result;
  }

  public function data(): array
  {
    return [
      'url'     => $this->m_URL,
      'method'  => $this->m_method,
      'body'    => $this->m_body,
      'query'   => $this->m_query
    ];
  }

  public function URL(): string
  {
    return $this->m_URL;
  }

  public function method(): string
  {
    return $this->m_method;
  }

  public function body(): array
  {
    return json_decode($this->m_body);
  }

  public function query(string $param): string
  {
    $found = $this->m_query[$param]; 
    return (isset($found)) ? $found : null;
  }
}
