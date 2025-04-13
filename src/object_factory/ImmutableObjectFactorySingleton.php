<?php

namespace Arunagirinathar\DesignPatterns\ObjectFactory;

use Arunagirinathar\DesignPatterns\Singleton;

abstract class ImmutableObjectFactorySingleton extends Singleton
{
    use BaseObjectFactory;

    protected function __construct(?array $args)
    {
        $this->lockOnAssign = true;
        $this->initAssign($args);
        parent::__construct();
    }
}
