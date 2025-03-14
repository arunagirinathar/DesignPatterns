<?php

namespace Arunagirinathar\DesignPatterns;

/**
 * Polyfills class
 *
 * This class is used to provide polyfills for missing functions in PHP
 * This class is a part of the design pattern package
 * 
 * php version 8
 *
 * @category DesignPattern
 * @package  Arunagirinathar\DesignPatterns
 * @author   Arunagirinathar <arunagirinathar@gmail.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     https://github.com/arunagirinathar/DesignPatterns
 */

class Polyfills
{
  public function __construct()
  {
    $this->initializePolyfills();
  }

  private function initializePolyfills()
  {
    // Use Reflection to get all methods of the class
    $reflection = new \ReflectionClass($this);
    $methods = $reflection->getMethods(\ReflectionMethod::IS_PRIVATE); // Retrieve only private methods

    foreach ($methods as $method) {
      $methodName = $method->getName();
      if ($methodName !== 'initializePolyfills') { // Skip the initializer itself
        // Make the method accessible and invoke it
        $method->setAccessible(true);
        $method->invoke($this);
      }
    }
  }

  private function json_validate()
  {
    if (!function_exists('json_validate')) {
      eval('function json_validate(string $string): bool
      {
        $decoded = json_decode($string);
        return !(is_null($decoded) || json_last_error() !== JSON_ERROR_NONE);
      }');
    }
  }

  // Add more polyfill methods as needed
}
