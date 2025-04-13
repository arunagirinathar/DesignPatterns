<?php

namespace Arunagirinathar\DesignPatterns\ObjectFactory;

class ObjectFactory
{
    use BaseObjectFactory;

    public function __construct(?array $args)
    {
        $this->lockOnAssign = false;
        $this->initAssign($args);
    }
}