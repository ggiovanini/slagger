<?php

namespace Slagger;

use Slagger\AbstractClasses\BasicClass;

class Message extends BasicClass
{
    protected string $text;
    protected Channel $channel;
    protected array $blocks;

    public function __construct(string $text = "", array $blocks = [], ?Channel $channel = null)
    {
        $this->text = $text;
        $this->blocks = $blocks;
        $this->channel = $channel ?? new Channel();
    }

    public function __toString(): string
    {
        return json_encode($this->render());
    }

    public function __invoke(): array
    {
        return $this->render();
    }

    public function channel(string $channel): self
    {
        $this->channel = new Channel($channel);
        return $this;
    }

    public function render(): array
    {
        $result = [
            'text' => $this->text,
            'blocks' => $this->blocks,
        ];
        if ($channel = (string) $this->channel) $result['channel'] = $channel;
        return $result;
    }
}
