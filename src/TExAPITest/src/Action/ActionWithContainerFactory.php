<?php

namespace TExAPITest\Action;


use Psr\Container\ContainerInterface;

class ActionWithContainerFactory
{
    public function __invoke(ContainerInterface $container, $name)
    {
        return new $name($container);
    }

}