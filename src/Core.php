<?php

namespace Slagger;

use Slagger\AbstractClasses\BasicClass;

class Core extends BasicClass
{
    protected Connection $connection;
    protected Message $message;
    protected Channel $channel;
    protected ?string $return;

    public function __construct(?Connection $connection = null, ?Message $message = null, ?Channel $channel = null)
    {
        $this->connection = $connection ?? new Connection();
        if ($message) $this->message = $message;
        if ($channel) $this->channel = $channel;
    }

    public function createConnection(string $webHookUrl): self
    {
        $this->connection = new Connection($webHookUrl);
        return $this;
    }

    public function withChannel(string|Channel $channel): self
    {
        if ($channel instanceof Channel) {
            $this->channel = $channel;
        } else {
            $this->channel = new Channel($channel);
        }
        return $this;
    }

    public function createMessage(string $text, array $blocks = [], ?Channel $channel = null): self
    {
        return $this->message(new Message($text, $blocks, $channel ?? $this->channel ?? null));
    }

    public static function sendMessage(string $text, array $blocks = []): bool
    {
        return Core::getInstance()->createMessage(new Message($text, $blocks))->send();
    }

    public function message(Message $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function send(): bool
    {
        $message = (string) $this->message;

        $ch = curl_init((string) $this->connection);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($message))
        );
        $this->return = json_decode(curl_exec($ch));

        return true;
    }
}
