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
                $this->deck[] = [
                    'suite' => $suit,
                    'color' => $color,
                    'value' => $value];
            }
        }

        return $this->deck;
    }

    /**
     * @throws \Exception
     */
    public function drawGivenNumOfCards($numCardsToDraw): array
    {
        $drawnCards = [];
        $drawnCardsCounter = 0;

        for ($i = 0; $i < $numCardsToDraw; $i++) {
            $randomNumber = random_int(0, 51 - $drawnCardsCounter);
            $drawnCards[] = $this->deck[$randomNumber];
            array_splice($this->deck, $randomNumber, 1);
            $drawnCardsCounter++;
        }

        return $drawnCards;
    }

    public function getDeck(): array
    {
        return $this->deck;
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
