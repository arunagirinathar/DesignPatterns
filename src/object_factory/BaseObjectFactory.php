<?php

namespace Arunagirinathar\DesignPatterns\ObjectFactory;

trait BaseObjectFactory
{
    protected array $_var;
    protected readonly bool $lockOnAssign;

    private function initAssign(array $args)
    {
        if (!empty($args)) {
            foreach ($args as $key => $value) {

                $key = $this->sanitizeKey($key);
                if (array_key_exists($key, $this->_var)) {
                    trigger_error("Property $key already exists. Trying a non-collisional property name.", E_USER_NOTICE);
                    $copy_count = 1;
                    while (array_key_exists($key, $this->_var)) {
                        $key = $key . '_copy' . $copy_count++;
                    }
                    trigger_error("Saving property as " . $key, E_USER_NOTICE);
                }

                $this->_var[$key] = $value;
            }
        }
    }

    public function __get(string $var): mixed
    {
        if (isset($this->_var[$var])) {
            return $this->_var[$var];
        } else {
            throw new \InvalidArgumentException('Unknown property ' . $var);
        }
    }

    public function __set(string $key, mixed $value): void
    {
        if (isset($this->_var[$key]) && $this->lockOnAssign === true) {
            trigger_error('Property ' . $key . ' has been overwritten with new value', E_USER_WARNING);
            return;
        }

        $this->_var[$key] = $value;
    }

    public function __unset(string $var)
    {
        if (!array_key_exists($var, $this->_var)) {
            trigger_error("Trying to unset undefined property '$var'", E_USER_NOTICE);
            return;
        }

        if ($this->lockOnAssign === true) {
            throw new \Exception('Cannot unset Immutable property ' . $var);
        }
        unset($this->_var[$var]);
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->_var);
    }

    public function all(): array
    {
        return $this->_var;
    }

    protected function sanitizeKey(string|int $key): string
    {
        if (is_numeric($key)) {
            trigger_error("Numeric key '$key' converted to 'var_$key'", E_USER_NOTICE);
            return "var_" . (string) $key;
        }

        if (!preg_match('/[a-zA-Z_]/', substr($key, 0, 1))) {
            trigger_error("Key '$key' starts with invalid character. Prepending underscore.", E_USER_WARNING);
            return '_' . $key;
        }

        return $key;
    }

    public static function create(array $args = [], bool $lock = false): self
    {
        return new static($lock, $args);
    }

    public function assign($key, $value)
    {
        $this->__set($key, $value);
        return $this;
    }

    public function with($key, $value)
    {
        return $this->assign($key, $value);
    }
}
