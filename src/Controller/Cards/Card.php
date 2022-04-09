<?php

declare(strict_types=1);


namespace App\Cards;

class Card
{
    private string $suite;
    private string $value;
    private string $color;

    /**
     * @param string $suite
     * @param string $value
     * @param string $color
     */
    public function __construct(string $suite, string $value, string $color)
    {
        $this->suite = $suite;
        $this->value = $value;
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
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    private function getCorrectColor($suite)
    {
        $redSuits = ['&hearts;', '&diams;'];

        if (in_array($suite, $redSuits, true)) {
            return 'red';
        }

        return 'black';
    }
}