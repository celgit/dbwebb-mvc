<?php

declare(strict_types=1);


namespace App\Cards;

class Hand extends Deck
{
    protected Deck $hand;

    public function __construct()
    {
        $this->hand = new Deck();
    }

    public function placeCardInHand($card)
    {
        $this->hand[] = $card;
    }
}