<?php

declare(strict_types=1);

namespace App\Cards;

class DeckOfJokers extends Deck
{
    /**
     * @var array<Card>
     */
    private array $deckOfJokers = [];

    /**
     * @var array<string>
     */
    private array $jokers = ["&#x2733;", "&#x2733;"];


    public function createNewDeck(): static
    {
        foreach ($this->jokers as $joker) {
            $card = new Card($joker, 'Joker', 0, 'green');
            $this->deckOfJokers[] = $card;
        }
        return $this;
    }

    /**
     * @return array<Card>
     */
    public function getDeckOfJokers(): array
    {
        return $this->deckOfJokers;
    }
}
