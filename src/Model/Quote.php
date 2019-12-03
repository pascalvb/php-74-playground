<?php

namespace App\Model;

class Quote
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function format(string $format = null): string
    {
        $format ??= 'uppercase';
        if ($format === 'uppercase') {
            return strtoupper($this->text);
        } elseif ($format === 'lowercase') {
            return strtolower($this->text);
        } elseif ($format == 'normal') {
            return $this->text;
        }
        throw new \RuntimeException('Lol');
    }

    public function __toString(): string
    {
        return $this->text;
    }
}