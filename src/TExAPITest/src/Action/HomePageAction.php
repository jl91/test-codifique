<?php

namespace TExAPITest\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use TExAPITest\Http\HalJsonResponse;

class HomePageAction implements ServerMiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return new HalJsonResponse(['foo' => 'bar']);
    }
}
