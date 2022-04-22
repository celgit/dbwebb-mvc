<?php

namespace App\game;

use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    private $card;

    public function setUp(): void
    {
        $this->card = new Card('hearts', '2', 2, 'red');
    }

    public function testGetSuite(): void
    {
        self::assertSame('hearts', $this->card->getSuite());
    }

    public function testGetValue(): void
    {
        self::assertSame('2', $this->card->getValue());
    }

    public function testGetValuePoint(): void
    {
        self::assertSame(2, $this->card->getValuePoint());
    }

    public function testGetColor(): void
    {
        self::assertSame('red', $this->card->getColor());
    }
}
