<?php

namespace Arunagirinathar\DesignPatterns;

/**
 * Abstract class that implements the Stateless Singleton pattern.
 *
 * This class ensures that the subclass cannot be instantiated, cloned, serialized, or unserialized.
 * It is intended to be used when you need a class that provides static utility methods or constants, 
 * but you want to prevent any instance creation or duplication of that class during runtime.
 * 
 * This pattern is particularly useful for utility classes that do not need to maintain state across 
 * multiple instances, and where a single "global" access point is sufficient.
 *
 * **Important:**
 * - The class **cannot** be instantiated.
 * - The class **cannot** be cloned.
 * - The class **cannot** be serialized or unserialized.
 *
 * Use this class when you need a stateless utility class with the following constraints:
 * - The class is not supposed to be instantiated.
 * - The class should not allow cloning, serialization, or unserialization.
 * - The class may define constants or static utility methods, but should never maintain state.
 * 
 * ### Example Use Case:
 * - Utility classes with static methods (e.g., configuration, helper functions).
 * - A class that defines a set of constants (e.g., error codes, configuration flags) with no need for an instance.
 *
 * **When NOT to Use:**
 * - When you need to create an instance of the class, store data on it, or maintain its state.
 * - When you need to support cloning or serialization/unserialization (e.g., caching, session management).
 * 
 * @package Arunagirinathar\DesignPatterns
 * @author Arunagirinathar  
 * @since 1.2.9
 */

abstract class StatelessSingleton
{
    // Prevent instantiation by making the constructor private
    final private function __construct() {}

    /**
     * Prevent Cloning of Singleton instances.
     *
     * @throws \Exception
     */
    public function __clone()
    {
        throw new \Exception("Cloning is not allowed on this Singleton object.");
    }

    /**
     * Prevent Serialization of Singleton instances.
     *
     * @throws \Exception
     */
    public function __sleep()
    {
        throw new \Exception("Serialization is not allowed for this Singleton object.");
    }

    /**
     * Prevent Unserialization of Singleton instances.
     *
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception("Unserialization is not allowed for this Singleton object.");
    }
}
