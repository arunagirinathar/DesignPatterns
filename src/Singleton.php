<?php

namespace Arunagirinathar\DesignPatterns;

/**
 * Singleton class
 *
 * This class is used to create a singleton instance of a class
 * This class is abstract and should be extended by the class that needs to be a singleton.
 * php version 8
 *
 * @category DesignPattern
 * @package  Arunagirinathar\DesignPatterns
 * @author   Arunagirinathar <arunagirinathar@gmail.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     https://github.com/arunagirinathar/DesignPatterns
 * @since    1.0.0
 * @version  1.1.1
 */
abstract class Singleton
{
  private static array $_instances = [];

  protected function __construct() {}

  private function __clone() {} // Prevent cloning
  private function __wakeup() {} // Prevent unserializing

  // @since 1.1.0
  public function __sleep() {

    // Fixed to return an empty array to prevent serialization
    return [];
  } // Prevent serializing

  /**
   * Get the singleton instance
   *  
   * @return static
   * @since 1.0.0
   */
  public static function getInstance(): static
  {
    $class = static::class;

    if (!isset(self::$_instances[$class])) {
      // This is left for backwards compatibility
      self::$_instances[$class] = new static();
    }
    return self::$_instances[$class];
  }

  /**
   * Initialize a class with arguments (getInstance does not support arguments)
   * This method does not overwrite an existing instance.
   *
   * @param mixed ...$args
   * @return static
   * @since 1.1.0
   */
  public static function initialize(...$args): static
  {
    $class = static::class;
    if (!isset(self::$_instances[$class])) {
      self::$_instances[$class] = new static(...$args);
    } else {
      trigger_error($class . ' has already been instantiated. Use forceInitialize() to overwrite the existing instance.', E_USER_WARNING);
    }

    return static::getInstance();
  }

  /**
   * Force initialization and overwrite an existing instance.
   *
   * @param mixed ...$args
   * @return static
   * @since 1.1.0
   */
  public static function forceInitialize(...$args): static
  {
    $class = static::class;
    if (isset(self::$_instances[$class])) {
      trigger_error('Forcibly overwriting the existing instance of ' . $class, E_USER_WARNING);
    }

    self::$_instances[$class] = new static(...$args);

    return static::getInstance();
  }

  /**
   * Delete the existing instance.
   *
   * @return void
   * @since 1.1.0
   */
  public static function deleteInstance(): void
  {
    $class = static::class;
    unset(self::$_instances[$class]);
  }

  /**
   * Reset and reinitialize the instance.
   *
   * @return static
   */
  public static function resetInstance(...$args): static
  {
    self::deleteInstance();
    return self::initialize(...$args); // Pass args if needed for reinitialization
  }
}
