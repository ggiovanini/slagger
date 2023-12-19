<?php

namespace Slagger;

use Slagger\AbstractClasses\BaseAbstract;
use Slagger\AbstractClasses\BasicClass;

class Connection extends BasicClass
{
    public static ?string $connection = null;

    public function __construct(?string $connection = null)
    {
        self::$connection = $connection ?? $_ENV['SLACK_CONNECTION'] ?? "https://hooks.slack.com/services/";
    }

    public static function connection(string $connection): BaseAbstract
    {
        self::$connection = $connection;
        return self::$instance;
    }

    public function __toString(): string
    {
        return self::$connection ?? "";
    }
}
