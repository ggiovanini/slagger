<?php

namespace Slagger;

use Slagger\AbstractClasses\BasicClass;

class Channel extends BasicClass
{
    public string $channel;

    public function __construct(?string $channel = null)
    {
        $this->channel = $channel ?? $_ENV['SLACK_CHANNEL'] ?? "";
    }

    public function __toString(): string
    {
        return $this->channel ?? "";
    }
}
