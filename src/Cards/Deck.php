<?php

declare(strict_types=1);

namespace App\Cards;

use Exception;

class Deck
{
    private array $deck;
    protected const SUITS = ["&hearts;", '&diams;', '&clubs;', '&spades;'];
    protected const CARD_VALUES = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 11,
        'Q' => 12,
        'K' => 13,
        'A' => 14,
//        'A' => [1, 14] //TODO måste hantera båda värdena av Ess.
    ];

    /**
     * @param array $deck
     */
    public function __construct(array $deck = [])
    {
        $this->deck = $deck;
    }


    public function createNewDeck(): static
    {
        foreach (self::SUITS as $suit) {
            $color = $this->getCorrectColor($suit);

            foreach (self::CARD_VALUES as $value => $valuePoints) {
                $card = new Card($suit, (string)$value, $valuePoints, $color, is_array($valuePoints));
                $this->deck[] = $card;
            }
        }

        return $this;
    }

    /**
     * @throws Exception
     */
    public function drawGivenNumOfCards(int $numCardsToDraw): array
    {
        $drawnCards = [];
        $deckSize = count($this->deck);

        if ($numCardsToDraw > $deckSize) {
            $numCardsToDraw = $deckSize;
        }

        for ($i = 0; $i < $numCardsToDraw; $i++) {
            $randomNumber = random_int(0, count($this->deck) - 1);
            $drawnCards[] = $this->deck[$randomNumber];
            array_splice($this->deck, $randomNumber, 1);
        }

        return $drawnCards;
    }

    public function getDeck(): array
    {
        return $this->deck;
    }

    public function shuffleDeck(): void
    {
        $shuffleDeck = $this->getDeck();
        shuffle($shuffleDeck);

        $this->deck = $shuffleDeck;
    }

    public function addToDeck(array $cards): void
    {
        foreach ($cards as $card) {
            $this->deck[] = $card;
        }
    }

    private function getCorrectColor(string $suite): string
    {
        $redSuits = ['&hearts;', '&diams;'];

        if (in_array($suite, $redSuits, true)) {
            return 'red';
        }

        return 'black';
    }
}
