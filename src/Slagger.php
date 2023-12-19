<?php

namespace Slagger;

use Slagger\AbstractClasses\BasicClass;

class Slagger extends BasicClass
{
    public static function sendMessage(string $text, array $block = [], ?Channel $channel = null): bool
    {
        return Core::getInstance()->createMessage($text, $block, $channel)->send();
    }

    public static function withChannel(string $channel): Core
    {
        return Core::getInstance()->withChannel($channel);
    }

    public static function createMessage(string $text, array $block = []): Core
    {
        return Core::getInstance()->createMessage($text, $block);
    }

    public static function createConnection(string $webHookUrl): Core
    {
        return Core::getInstance()->createConnection($webHookUrl);
    }
}
