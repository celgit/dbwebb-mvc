<?php

namespace App\game;

use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    public function testAddToHand(): void
    {
        $hand = new Hand();

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black')
        ];

        self::assertCount(0, $hand->getHand());
        $hand->addToHand($cards);
        self::assertCount(2, $hand->getHand());
    }

    public function testGetHandValue(): void
    {
        $hand = new Hand();

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black'),
            new Card('clubs', 'A', 14, 'black')
        ];

        $hand->addToHand($cards);

        self::assertSame(30, $hand->getHandValue(false));
        self::assertSame(17, $hand->getHandValue(true));
    }

    public function testHandContainsAce(): void
    {
        $handWithAce = new Hand();

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black'),
            new Card('clubs', 'A', 14, 'black')
        ];

        $handWithAce->addToHand($cards);
        self::assertTrue($handWithAce->handContainsAce());

        $handWithOutAce = new Hand();

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black'),
        ];

        $handWithOutAce->addToHand($cards);
        self::assertFalse($handWithOutAce->handContainsAce());
    }

    public function testGetHandValueWithAces(): void
    {
        $handWithAces = new Hand();
        $game = new Game();

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black'),
            new Card('clubs', 'A', 14, 'black'),
            new Card('spades', 'A', 14, 'black')
        ];

        $handWithAces->addToHand($cards);

        self::assertSame(18, $handWithAces->getHandValueWithAces($game));
    }
}
