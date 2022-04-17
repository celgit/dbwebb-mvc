<?php

declare(strict_types=1);

namespace App\Cards;

class Card
{
    public string $suite;
    public string $value;
    public int $valuePoint;
    public string $color;
    public bool $isAce = false;

    /**
     * @param string $suite
     * @param string $value
     * @param int $valuePoint
     * @param string $color
     */
    public function __construct(
        string $suite,
        string $value,
        int $valuePoint,
        string $color,
    ) {
        $this->suite = $suite;
        $this->value = $value;
        $this->valuePoint = $valuePoint;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getSuite(): string
    {
        return $this->suite;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getValuePoint(): int
    {
        return $this->valuePoint;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
}
