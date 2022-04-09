<?php

declare(strict_types=1);

namespace App\Cards;

class Deck
{
    private array $deck = [];
    private array $suits = ["&hearts;", '&diams;', '&clubs;', '&spades;'];
    private array $values = [
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'J',
        'Q',
        'K',
        'A'
    ];


    public function createNewDeck()
    {
        foreach ($this->suits as $suit) {
            $color = $this->getCorrectColor($suit);

            foreach ($this->values as $value) {
                $card = new Card($suit, $value, $color);
                $this->deck[] = $card;
            }
        }

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function drawGivenNumOfCards($numCardsToDraw): array
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

    public function shuffleDeck()
    {
        $shuffleDeck = $this->getDeck();
        shuffle($shuffleDeck);

        $this->deck = $shuffleDeck;
    }

    public function addToDeck($arrayOfCards): void
    {
        foreach ($arrayOfCards as $card) {
            $this->deck[] = $card;
        }
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
