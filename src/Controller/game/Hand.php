<?php

declare(strict_types=1);


namespace App\Controller\game;

use App\Cards\Card;
use Exception;

class Hand
{
    private array $hand = [];
    public string $valuePointsColor = 'black';

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

    public function getHandValue(): int
    {
        $value = 0;

        /** @var Card $card */
        foreach ($this->hand as $card) {
            $value += $card->getValuePoint();
        }

        return $value;
    }

    public function getValuePointsColor(): string
    {
        $value = $this->getHandValue();

        if ($value >= 22) {
            $this->valuePointsColor = 'red';
        } elseif ($value >= 17) {
            $this->valuePointsColor = 'green';
        }

        return $this->valuePointsColor;
    }
}