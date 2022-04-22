<?php

namespace App\game;

use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class GameTest extends TestCase
{
    /**
     * @return void
     */
    public function testHandleResetInput(): void
    {
        $game = new Game();
        $session = new Session(new MockArraySessionStorage());
        $session->set('omgTesting', true);

        self::assertTrue($session->get('omgTesting'));

        $this->resetIsTrue($game, $session);

        $this->startIsTrue($session, $game);

        $this->bothResetAndStartIsFalse($session, $game);
    }

    /**
     * @throws Exception
     * @return void
     */
    public function testHandleDrawInput(): void
    {
        $game = new Game();
        $session = new Session(new MockArraySessionStorage());
        $dealerHand = new Hand();
        $playerHand = new Hand();
        $deck = new Deck();
        $deck->prepareDeck($session);

        self::assertCount(0, $dealerHand->getHand());
        self::assertCount(0, $playerHand->getHand());

        $this->playerDrawsOneCard($game, $session, $dealerHand, $deck, $playerHand);

        $this->dealerDrawsOneCard($session, $game, $dealerHand, $deck, $playerHand);
    }

    /**
     * @return void
     */
    public function testHandleDoneInput(): void
    {
        $game = new Game();
        $session = new Session(new MockArraySessionStorage());
        $dealerHand = new Hand();
        $playerHand = new Hand();

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black'),
            new Card('clubs', '10', 10, 'black')
        ];

        $this->playerIsBust($playerHand, $cards, $game, $session, $dealerHand);

        $playerHand = $this->dealerIsBust($session, $dealerHand, $cards, $game);

        $this->playersTurnIsDone($session, $game, $playerHand);
    }

    /**
     * @return void
     */
    public function testGetWinnerMessage(): void
    {
        $game = new Game();
        $dealerHand = new Hand();
        $playerHand = new Hand();
        $playerWinsMessage = 'Player wins!';
        $dealerWinsMessage = 'Dealer wins!';

        $cardsWorth6or19Points = [
            new Card('hearts', '2', 2, 'red'),
            new Card('diamonds', '3', 3, 'black'),
            new Card('clubs', 'A', 14, 'black')
        ];

        $cardsWorth16or29Points = [
            new Card('hearts', '2', 2, 'red'),
            new Card('diamonds', 'K', 13, 'black'),
            new Card('clubs', 'A', 14, 'black')
        ];

        $cardsWorth13Points= [
            new Card('hearts', '2', 2, 'red'),
            new Card('diamonds', 'J', 11, 'black'),
        ];

        $this->playerWinsWithAceAs14(
            $playerHand,
            $cardsWorth6or19Points,
            $dealerHand,
            $cardsWorth13Points,
            $playerWinsMessage,
            $game
        );

        $this->dealerWinsWithAceAs14(
            $cardsWorth13Points,
            $cardsWorth6or19Points,
            $dealerWinsMessage,
            $game
        );

        $this->playerWinsWithAceAs1WhenDealerAlsoHasAnAce(
            $cardsWorth6or19Points,
            $cardsWorth16or29Points,
            $playerWinsMessage,
            $game
        );

        $this->DealerWinsWithAceAs1AndPlayerAlsoHasAnAce(
            $cardsWorth16or29Points,
            $cardsWorth6or19Points,
            $dealerWinsMessage,
            $game
        );
    }

    /**
     * @param Game $game
     * @param Session $session
     */
    private function resetIsTrue(Game $game, Session $session): void
    {
        $game->handleResetInput(true, false, $session);
        self::assertNull($session->get('omgTesting'));
    }

    /**
     * @param Session $session
     * @param Game $game
     */
    private function startIsTrue(Session $session, Game $game): void
    {
        $session->set('omgTesting', true);
        $game->handleResetInput(false, true, $session);
        self::assertNull($session->get('omgTesting'));
    }

    /**
     * @param Session $session
     * @param Game $game
     */
    private function bothResetAndStartIsFalse(Session $session, Game $game): void
    {
        $session->set('omgTesting', true);
        $game->handleResetInput(false, false, $session);
        self::assertTrue($session->get('omgTesting'));
    }

    /**
     * @param Game $game
     * @param Session $session
     * @param Hand $dealerHand
     * @param Deck $deck
     * @param Hand $playerHand
     * @throws Exception
     */
    private function playerDrawsOneCard(Game $game, Session $session, Hand $dealerHand, Deck $deck, Hand $playerHand): void
    {
        $game->handleDrawInput($session, $dealerHand, $deck, $playerHand);

        self::assertCount(0, $dealerHand->getHand());
        self::assertCount(1, $playerHand->getHand());
    }

    /**
     * @param Session $session
     * @param Game $game
     * @param Hand $dealerHand
     * @param Deck $deck
     * @param Hand $playerHand
     * @throws Exception
     */
    private function dealerDrawsOneCard(Session $session, Game $game, Hand $dealerHand, Deck $deck, Hand $playerHand): void
    {
        $session->set('dealersTurn', true);
        $game->handleDrawInput($session, $dealerHand, $deck, $playerHand);
        self::assertCount(1, $dealerHand->getHand());
        self::assertCount(1, $playerHand->getHand());
    }

    /**
     * @param Hand $playerHand
     * @param array $cards
     * @param Game $game
     * @param Session $session
     * @param Hand $dealerHand
     */
    private function playerIsBust(Hand $playerHand, array $cards, Game $game, Session $session, Hand $dealerHand): void
    {
        $playerHand->addToHand($cards);

        self::assertSame(
            'Player is bust, dealer wins!',
            $game->handleDoneInput($playerHand, $session, $dealerHand)
        );
    }

    /**
     * @param Session $session
     * @param Hand $dealerHand
     * @param array $cards
     * @param Game $game
     * @return Hand
     */
    private function dealerIsBust(Session $session, Hand $dealerHand, array $cards, Game $game): Hand
    {
        $playerHand = new Hand();
        $session->set('dealersTurn', true);
        $dealerHand->addToHand($cards);
        self::assertSame(
            'Dealer is bust, player wins!',
            $game->handleDoneInput($playerHand, $session, $dealerHand)
        );
        return $playerHand;
    }

    /**
     * @param Session $session
     * @param Game $game
     * @param Hand $playerHand
     */
    private function playersTurnIsDone(Session $session, Game $game, Hand $playerHand): void
    {
        $dealerHand = new Hand();
        $session->clear();
        self::assertSame(
            'Player is done, dealers turn',
            $game->handleDoneInput($playerHand, $session, $dealerHand)
        );
        self::assertTrue($session->get('dealersTurn'));
    }

    /**
     * @param Hand $playerHand
     * @param array $cardsWorth6or19Points
     * @param Hand $dealerHand
     * @param array $cardsWorth13Points
     * @param string $playerWinsMessage
     * @param Game $game
     */
    private function playerWinsWithAceAs14(Hand $playerHand, array $cardsWorth6or19Points, Hand $dealerHand, array $cardsWorth13Points, string $playerWinsMessage, Game $game): void
    {
        $playerHand->addToHand($cardsWorth6or19Points);
        $dealerHand->addToHand($cardsWorth13Points);
        self::assertSame($playerWinsMessage, $game->getWinnerMessage($playerHand, $dealerHand));
    }

    /**
     * @param array $cardsWorth13Points
     * @param array $cardsWorth6or19Points
     * @param string $dealerWinsMessage
     * @param Game $game
     * @return Hand[]
     */
    private function dealerWinsWithAceAs14(array $cardsWorth13Points, array $cardsWorth6or19Points, string $dealerWinsMessage, Game $game): array
    {
        $dealerHand = new Hand();
        $playerHand = new Hand();
        $playerHand->addToHand($cardsWorth13Points);
        $dealerHand->addToHand($cardsWorth6or19Points);
        self::assertSame($dealerWinsMessage, $game->getWinnerMessage($playerHand, $dealerHand));
        return array($dealerHand, $playerHand);
    }

    /**
     * @param array $cardsWorth6or19Points
     * @param array $cardsWorth16or29Points
     * @param string $playerWinsMessage
     * @param Game $game
     * @return Hand[]
     */
    private function playerWinsWithAceAs1WhenDealerAlsoHasAnAce(array $cardsWorth6or19Points, array $cardsWorth16or29Points, string $playerWinsMessage, Game $game): array
    {
        $dealerHand = new Hand();
        $playerHand = new Hand();
        $playerHand->addToHand($cardsWorth6or19Points);
        $dealerHand->addToHand($cardsWorth16or29Points);
        self::assertSame($playerWinsMessage, $game->getWinnerMessage($playerHand, $dealerHand));
        return array($dealerHand, $playerHand);
    }

    /**
     * @param array $cardsWorth16or29Points
     * @param array $cardsWorth6or19Points
     * @param string $dealerWinsMessage
     * @param Game $game
     */
    private function DealerWinsWithAceAs1AndPlayerAlsoHasAnAce(array $cardsWorth16or29Points, array $cardsWorth6or19Points, string $dealerWinsMessage, Game $game): void
    {
        $dealerHand = new Hand();
        $playerHand = new Hand();
        $playerHand->addToHand($cardsWorth16or29Points);
        $dealerHand->addToHand($cardsWorth6or19Points);
        self::assertSame($dealerWinsMessage, $game->getWinnerMessage($playerHand, $dealerHand));
    }

}
