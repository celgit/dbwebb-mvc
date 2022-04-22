<?php

namespace App\game;
namespace App\game\Card;

use App\game\Card;
use App\game\Deck;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class DeckTest extends TestCase
{
    public function testCreateNewDeck(): void
    {
        $deck = new Deck();
        $deck->createNewDeck();

        self::assertCount(52, $deck->getDeck());

        /** @var Card $firstCardInDeck */
        $firstCardInDeck = $deck->getDeck()[0];

        /** @var Card $lastCardInDeck */
        $lastCardInDeck = $deck->getDeck()[51];

        self::assertInstanceOf(Card::class, $firstCardInDeck);
        self::assertSame('&hearts;', $firstCardInDeck->getSuite());
        self::assertSame('2', $firstCardInDeck->getValue());
        self::assertSame(2, $firstCardInDeck->getValuePoint());
        self::assertSame('red', $firstCardInDeck->getColor());

        self::assertInstanceOf(Card::class, $lastCardInDeck);
        self::assertSame('&spades;', $lastCardInDeck->getSuite());
        self::assertSame('A', $lastCardInDeck->getValue());
        self::assertSame(14, $lastCardInDeck->getValuePoint());
        self::assertSame('black', $lastCardInDeck->getColor());
    }

    /**
     * @throws Exception
     */
    public function testDrawGivenNumOfCards(): void
    {
        $deck = new Deck();
        $deck->createNewDeck();

        self::assertCount(52, $deck->getDeck());

        $drawnCards = $deck->drawGivenNumOfCards(2);

        self::assertCount(2, $drawnCards);
        self::assertCount(50, $deck->getDeck());

        $drawnCards = $deck->drawGivenNumOfCards(54);

        self::assertCount(50, $drawnCards);
        self::assertCount(0, $deck->getDeck());
    }

    public function testShuffleDeck(): void
    {
        $newDeck = new Deck();
        $newDeck->createNewDeck();

        $shuffledDeck = new Deck();
        $shuffledDeck->createNewDeck();
        $shuffledDeck->shuffleDeck();

        self::assertNotSame($newDeck, $shuffledDeck);
    }

    public function testAddToDeck(): void
    {
        $deck = new Deck();

        self::assertCount(0, $deck->getDeck());

        $cards = [
            new Card('hearts', '4', 4, 'red'),
            new Card('diamonds', 'Q', 12, 'black')
        ];

        $deck->addToDeck($cards);

        self::assertCount(2, $deck->getDeck());
    }

    public function testGetCorrectColor(): void
    {
        $deck = new Deck();

        self::assertSame('red', $deck->getCorrectColor('&hearts;'));
        self::assertSame('red', $deck->getCorrectColor('&diams;'));
        self::assertSame('black', $deck->getCorrectColor('&spades;'));
        self::assertSame('black', $deck->getCorrectColor('&clubs;'));
        self::assertSame('black', $deck->getCorrectColor('notReallyAProperSuite'));

    }

    /**
     * @throws Exception
     */
    public function testPrepareDeck(): void
    {
        $session = new Session(new MockArraySessionStorage());

        $deck = new Deck();
        $deck->createNewDeck();
        $deck->drawGivenNumOfCards(10);

        self::assertCount(42, $deck->getDeck());

        $session->set('deck', $deck->getDeck());

        $newPreparedDeckFromSession = new Deck();

        self::assertCount(0, $newPreparedDeckFromSession->getDeck());
        $newPreparedDeckFromSession->prepareDeck($session);
        self::assertCount(42, $newPreparedDeckFromSession->getDeck());
        self::assertSame($deck->getDeck(), $newPreparedDeckFromSession->getDeck());

        $newEmptyDeck = new Deck();
        $session->clear();
        self::assertCount(0, $newEmptyDeck->getDeck());
        $newEmptyDeck->prepareDeck($session);
        self::assertCount(52, $newEmptyDeck->getDeck());
    }
}
