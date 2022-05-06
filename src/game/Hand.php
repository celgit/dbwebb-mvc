<?php

declare(strict_types=1);

namespace App\game;

class Hand extends Deck
{
    /**
     * @var array<Card>
     */
    private array $hand = [];

    /**
     * @return array<Card>
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    /**
     * @param array<Card> $cards
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
    public function getHandValue(bool $aceAsOne = false): int
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
    public function handContainsAce(): bool
    {
        /** @var Card $card*/
        foreach ($this->hand as $card) {
            if ($card->getValue() === 'A') {
                return true;
            }
        }
        return false;
    }

    public function getHandValueWithAces(Game $game): int
    {
        $value = $this->getHandValue();

        $numberOfAces = $this->getNumberOfAces();

        for ($i = 0; $i < $numberOfAces; $i++) {
            if ($value > $game::MAX_HAND_VALUE) {
                $value -= 13;
            }
        }

        return $value;
    }

    /**
     * @return int
     */
    private function getNumberOfAces(): int
    {
        $numberOfAces = 0;

        foreach ($this->hand as $card) {
            if ($card->getValue() === 'A') {
                $numberOfAces++;
            }
        }
        return $numberOfAces;
    }
}
