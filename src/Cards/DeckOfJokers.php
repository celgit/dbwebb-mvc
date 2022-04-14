<?php

declare(strict_types=1);

namespace App\Cards;

class DeckOfJokers extends Deck
{
    private array $deckOfJokers = [];
    private array $jokers = ["&#x2733;", "&#x2733;"];


    public function createNewDeck(): static
    {
        foreach ($this->jokers as $joker) {
            $card = new Card($joker, 'Joker', 'green');
            $this->deckOfJokers[] = $card;
        }
        return $this;
    }


    public function getDeckOfJokers(): array
    {
        return $this->deckOfJokers;
    }
}
