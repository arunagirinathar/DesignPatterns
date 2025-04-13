<?php

namespace Arunagirinathar\DesignPatterns\ObjectFactory;

/**
 * FrozenObjectFactorySingleton is a singleton that becomes completely immutable immediately after instantiation.
 * Any attempts to modify or unset properties will be ignored (or throw an exception if exception handling is enabled).
 * This class can be used when the object should be fixed from the moment it is created, with no modifications allowed.
 */
abstract class FrozenObjectFactorySingleton extends ImmutableObjectFactorySingleton
{
    /**
     * Prevent modification of properties after instantiation.
     *
     * @param string $key The property name.
     * @param mixed $value The value to set.
     *
     * @throws \Exception Always throws an exception, as frozen objects cannot be modified.
     */
    public function __set($key, $value): void
    {
        /**
         * Now there's no point in placing the blame
         * And you should know I suffer the same
         * I'm frozen becasue my config's not open"
         */
        throw new \Exception("Cannot modify property '$key' on an immutable object.");
    }

    /**
     * Prevent unsetting of properties after instantiation.
     *
     * @param string $key The property name.
     *
     * @throws \Exception Always throws an exception, as frozen objects cannot have properties unset.
     */
    public function __unset($key): void
    {
        throw new \Exception("Cannot unset property '$key' on a immutable object.");
    }
}
