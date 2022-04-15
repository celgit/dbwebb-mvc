<?php

declare(strict_types=1);


namespace App\Controller\game;

use App\Cards\Card;
use Exception;

class Hand
{
    private array $hand = [];

    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * @param Card[] $card
     */
    public function addToHand(array $cards): void
    {
        foreach ($cards as $card) {
            $this->hand[] = $card;
        }
    }

    public function getHandValue()
    {
        $value = 0;

        /** @var Card $card */
        foreach ($this->hand as $card) {
            $value += $card->getValuePoint();
        }

        return $value;
    }

    public function getNumOfCardsInHand()
    {
        return count($this->hand);
    }
}