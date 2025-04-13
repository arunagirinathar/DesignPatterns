<?php

use Arunagirinathar\DesignPatterns\Singleton;

abstract class ImmutableObjectFactory extends Singleton
{
    protected array $_var;
    // protected bool $lockOnAssign;

    public function __construct(protected readonly bool $lockOnAssign = false, ?array $args) {
        if(!empty($array)) {
            foreach($array as $key=>$value) {
                
                if(is_numeric($key)) {
                    trigger_error("...", E_USER_NOTICE);
                    $key = "var_".(string)$key;
                }

                if(is_string($key) && !preg_match('[a-zA-Z_', substr($key, 0, 1))){
                    trigger_error('', E_USER_WARNING);
                    $key = '_'.$key;
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

    public function __set(string $key, mixed $value)
    {
        if (isset($this->_var[$key]) && $this->lockOnAssign === true) {
            trigger_error('Property ' . $key . ' has been overwritten with new value', E_USER_WARNING);
            return false;
        }

        $this->_var[$key] = $value;
        return true;
    }

    public function all(): array
    {
        return $this->_var;
    }
}
