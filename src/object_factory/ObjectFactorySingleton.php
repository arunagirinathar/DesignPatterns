<?php

namespace Arunagirinathar\DesignPatterns\ObjectFactory;

use Arunagirinathar\DesignPatterns\Singleton;

class ObjectFactorySingleton extends Singleton
{
    use BaseObjectFactory;

    protected function __construct(?array $args)
    {
        $this->lockOnAssign = false;
        $this->initAssign($args);
        parent::__construct();
    }
}