<?php

declare(strict_types=1);

namespace App\game;

use Exception;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Game
{
    public CONST MAX_HAND_VALUE = 21;

    /**
     * @param float|bool|int|string|null $reset
     * @param float|bool|int|string|null $start
     * @param SessionInterface $session
     */
    public function handleResetInput(
        float|bool|int|string|null $reset,
        float|bool|int|string|null $start,
        SessionInterface $session
    ): void {
        if ($reset || $start) {
            $session->clear();
        }
    }

    /**
     * @param SessionInterface $session
     * @param Hand $dealerHand
     * @param Deck $deck
     * @param Hand $playerHand
     * @throws Exception
     */
    public function handleDrawInput(
        SessionInterface $session,
        Hand $dealerHand,
        Deck $deck,
        Hand $playerHand
    ): void {
        if ($session->get('dealersTurn')) {
            $dealerHand->addToHand($deck->drawGivenNumOfCards(1));
        } else {
            $playerHand->addToHand($deck->drawGivenNumOfCards(1));
        }
    }

    /**
     * @param Hand $playerHand
     * @param SessionInterface $session
     * @param Hand $dealerHand
     * @return string
     */
    public function handleDoneInput(Hand $playerHand, SessionInterface $session, Hand $dealerHand): string
    {
        if ($this->handIsBust($playerHand)) {
            $message = 'Player is bust, dealer wins!';
        } elseif ($session->get('dealersTurn')) {
            if ($this->handIsBust($dealerHand)) {
                $message = 'Dealer is bust, player wins!';
            } else {
                $message =  $this->getWinnerMessage($playerHand, $dealerHand);
            }
        } else {
            $session->set('dealersTurn', true);
            $message = 'Player is done, dealers turn';
        }

        return $message;
    }

    /**
     * @param Hand $hand
     * @return bool
     */
    private function handIsBust(Hand $hand): bool
    {
        return ($hand->getHandValue() > self::MAX_HAND_VALUE &&
                !$hand->handContainsAce()) ||
            ($hand->getHandValue() > self::MAX_HAND_VALUE &&
                ($hand->getHandValueWithAces($this)) > self::MAX_HAND_VALUE );
    }

    /**
     * @param Hand $playerHand
     * @param Hand $dealerHand
     * @return string
     */
    public function getWinnerMessage(Hand $playerHand, Hand $dealerHand): string
    {
        $playerHandValue = $playerHand->getHandValue();
        $dealerHandValue = $dealerHand->getHandValue();

        if ($playerHandValue > self::MAX_HAND_VALUE && $playerHand->handContainsAce()) {
            $playerHandValue = $playerHand->getHandValueWithAces($this);
        }

        if ($dealerHandValue > self::MAX_HAND_VALUE && $dealerHand->handContainsAce()) {
            $dealerHandValue = $dealerHand->getHandValueWithAces($this);
        }

        if ($playerHandValue > $dealerHandValue) {
            return 'Player wins!';
        }

        return 'Dealer wins!';
    }
}
