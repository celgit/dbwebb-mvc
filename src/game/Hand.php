<?php

declare(strict_types=1);

namespace App\game;

use JetBrains\PhpStorm\Pure;

class Hand extends Deck
{
    private array $hand = [];

    /**
     * @return array
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * @param array $cards
     */
    public function addToHand(array $cards): void
    {
        foreach ($cards as $card) {
            $this->hand[] = $card;
        }
    }

    /**
     * @param false $aceAsOne
     * @return int
     */
    #[Pure] public function getHandValue(bool $aceAsOne = false): int
    {
        $value = 0;

        /** @var Card $card */
        foreach ($this->hand as $card) {
            if ($aceAsOne && $card->getValuePoint() === 14) {
                ++$value;
            } else {
                $value += $card->getValuePoint();
            }
        }

        return $value;
    }

    /**
     * @return bool
     */
    #[Pure] public function handContainsAce(): bool
    {
        /** @var Card $card*/
        foreach ($this->hand as $card) {
            if ($card->getValue() === 'A') {
                return true;
            }
        }
        return false;
    }
}
