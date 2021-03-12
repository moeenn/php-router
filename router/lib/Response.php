<?php

declare(strict_types=1);

namespace SOL5;

class Response
{
  public int $m_status;
  public string $m_body;

  function __construct($body, int $status = 200)
  { 
    $this->m_status = $status;
    $this->m_body = json_encode($body);
  }

  public function status(): int
  {
    return $this->m_status;
  }

  public function body(): string
  {
    return $this->m_body;
  }

  public function updateBody($newBody): void
  {
    $this->m_body = $newBody;
  }
}
