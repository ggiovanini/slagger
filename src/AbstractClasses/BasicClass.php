<?php

namespace Slagger\AbstractClasses;

class BasicClass extends BaseAbstract
{
    protected array $error = [];

    public function setError(string $message, ?int $code = null): self
    {
        $this->error[] = [
            $message,
            $code,
        ];
        return $this;
    }

    public function getError(): array
    {
        return $this->error;
    }

    public function hasError(): bool
    {
        return !!sizeof($this->error);
    }
}
