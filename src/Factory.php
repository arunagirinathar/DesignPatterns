<?php

namespace Arunagirinathar\DesignPatterns;

/**
 * Factory class
 *
 * This class is used to create an instance of a class
 * This class is abstract and should be extended by the class that needs to be a factory
 * This class is a part of the design pattern package
 * php version 8
 *
 * @category DesignPattern
 * @package  Arunagirinathar\DesignPatterns
 * @author   Arunagirinathar <arunagirinathar@gmail.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     https://github.com/arunagirinathar/DesignPatterns
 */
abstract class Factory
{
    /**
     * Create an instance of the given class with optional parameters.
     *
     * @param string $className Fully qualified class name
     * @param array $parameters Optional parameters to pass to the constructor
     * @return object
     * @throws \Exception If the class does not exist
     */
    public static function create(string $className, array $parameters = []): object
    {
        if (!class_exists($className)) {
            throw new \Exception("Class $className not found.");
        }

        $reflection = new \ReflectionClass($className);

        return $reflection->newInstanceArgs($parameters);
    }
}
