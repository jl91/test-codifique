<?php

namespace TExAPITest\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use TExAPITest\Http\HalJsonResponse;
use TExAPITest\Model\Database\Entity\CarsEntity;

class CarsAction implements ServerMiddlewareInterface
{
    private $container = null;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $em = $this->container
            ->get('em');

        $repository = $em->getRepository(CarsEntity::class);
        $result = $repository->findAll();

        return new HalJsonResponse($result);
    }


}