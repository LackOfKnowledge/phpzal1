<?php

namespace Apsl\Inf\Lab01;


class Message
{
    protected string $name;
    protected string $text;

    public function __construct(string $name = '', string $text = 'Hello')
    {
        $this->name = $name;
        $this->text = $text;
    }

    public function output(): void
    {
        echo "{$this->text} {$this->name}!";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
