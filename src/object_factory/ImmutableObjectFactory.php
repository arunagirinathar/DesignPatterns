<?php

namespace Arunagirinathar\DesignPatterns\ObjectFactory;

use Arunagirinathar\DesignPatterns\Singleton;

abstract class ObjectFactory
{
    use BaseObjectFactory;

    public function __construct(?array $args)
    {
        $this->lockOnAssign = true;
        $this->initAssign($args);
    }
}