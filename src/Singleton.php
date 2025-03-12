<?php

namespace Arunagirinathar\DesignPatterns;

/**
 * Sinlgeton class
 *
 * This class is used to create a singleton instance of a class
 * This class is abstract and should be extended by the class that needs to be a singleton
 * This class is a part of the design pattern package
 * php version 8
 *
 * @category DesignPattern
 * @package  Arunagirinathar\DesignPatterns
 * @author   Arunagirinathar <arunagirinathar@gmail.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     https://github.com/arunagirinathar/DesignPatterns
 */
abstract class Singleton
{
  private static array $_instances = [];

  protected function __construct() {}

  private function __clone() {} // Prevent cloning
  private function __wakeup() {} // Prevent unserializing
  // private function __sleep() {} // Prevent serializing

  /**
   * Get the singleton instance
   *
   * @return static
   */
  public static function getInstance(): static
  {
    $class = static::class;

    if (!isset(self::$_instances[$class])) {
      self::$_instances[$class] = new static();
    }
    return self::$_instances[$class];
  }
}
