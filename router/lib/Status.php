<?php

declare(strict_types=1);

namespace SOL5\Router\HTTP;

class Status
{
  const OK = 200;
  const CREATED = 201;
  const NOCONTENT = 204;
  const MOVEDPERMANENTLY = 301;
  const NOTMODIFIED = 304;
  const BADREQUEST = 400;
  const UNAUTHORIZED = 401;
  const FORBIDDEN = 403;
  const NOTFOUND = 404;
  const CONFLICT = 409;
  const INTERNALSERVERERROR = 500;
}