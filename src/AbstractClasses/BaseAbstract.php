<?php

namespace Slagger\AbstractClasses;

class BaseAbstract
{
    protected static ?BaseAbstract $instance = null;

    public static function getInstance(): static
    {
        if (!self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}
