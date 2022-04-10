<?php

namespace App\Controller;

use App\Cards\Deck;
use App\Cards\DeckOfJokers;
use App\Cards\JsonDeck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card")
     */
    public function start(): Response
    {
        return $this->render('card/start.html.twig');
    }

    /**
     * @Route("/card/api/deck", name="deck-json")
     */
    public function deckAsJson(): Response
    {
        $jsonDeck = new JsonDeck();
        $jsonDeck->createNewDeck();

        $jsonDeck = $jsonDeck->getJsonDeck();

        $data = [
            'jsonDeck' => $jsonDeck
        ];

        return $this->render('card/json-deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck", name="deck")
     */
    public function showDeck(): Response
    {
        $newDeck = new Deck();
        $newDeck->createNewDeck();

        $newDeck = $newDeck->getDeck();

        $data = [
            'deck' => $newDeck
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck2", name="deck2")
     */
    public function showDeck2(): Response
    {
        $newDeck = new Deck();
        $newDeck->createNewDeck();
        $newDeck = $newDeck->getDeck();

        $newDeckOfJokers = new DeckOfJokers();
        $newDeckOfJokers->createNewDeck();
        $newDeckOfJokers = $newDeckOfJokers->getDeckOfJokers();

        $data = [
            'deck' => $newDeck,
            'deckOfJokers' => $newDeckOfJokers,
        ];
        return $this->render('card/deck2.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle-deck")
     */
    public function shuffle(SessionInterface $session): Response
    {
        $newDeck = new Deck();
        $newDeck->createNewDeck();

        $newDeck->shuffleDeck();

        $newDeck = $newDeck->getDeck();

        $session->set('deck', $newDeck);

        $data = [
            'deck' => $newDeck
        ];
        return $this->render('card/shuffle-deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw-card")
     * @Route(
     *     "/card/deck/draw/{numOfDraws}",
     *     name="draw-number-of-cards",
     *     methods={"GET"})
     * @throws \Exception
     */
    public function drawNumberOfCards(
        Request $request,
        SessionInterface $session,
        int $numOfDraws = 1
    ): Response {
        $deck = new Deck();
        if ($session->get('deck') === null) {
            $deck->createNewDeck();
            $deck->shuffleDeck();
        } else {
            $deck->addToDeck($session->get('deck'));
        }

        $numOfGivenDraws = $numOfDraws;

        if ($numOfGivenDraws > 52) {
            $numOfGivenDraws = 52;
        }

        $drawnCards[] = $deck->drawGivenNumOfCards($numOfGivenDraws);
        $session->set('deck', $deck->getDeck());

        $data = [
            'deck' => $deck->getDeck(),
            'numOfDraws' => $request->get('numOfDraws'),
            'drawnCards' => $drawnCards
        ];

        return $this->render('card/draw-multiple-cards.html.twig', $data);
    }

    /**
     * @Route(
     *     "/card/deck/drawMultipleCards",
     *     name="draw-number-of-cards-redirect",
     *     methods={"POST"})
     * @throws \Exception
     */
    public function drawMultipleCardsRedirect(Request $request)
    {
        return $this->redirectToRoute('draw-number-of-cards', ['numOfDraws' => $request->request->get('numOfDraws')]);
    }

    /**
     * @Route(
     *     "/card/deck/deal/{players}/{numOfCards}",
     *     name="deal-cards-to-players"
     * )
     * @throws \Exception
     */
    public function dealCardsToPlayers(
        SessionInterface $session,
        int $players,
        int $numOfCards
    ): Response {
        $newDeck = new Deck();
        $newDeck->createNewDeck();

        $newDeck->shuffleDeck();

        $playerHands = [];

        for ($i = 0; $i < $players; $i++) {
            $playerHands[] = $newDeck->drawGivenNumOfCards($numOfCards);
        }
        $data = [
            'deck' => $newDeck->getDeck(),
            'players' => $players,
            'numOfCards' => $numOfCards,
            'playerHands' => $playerHands
        ];

        return $this->render('card/deal-cards-to-players.html.twig', $data);
    }

    /**
     * @Route(
     *     "/card/deck/dealings",
     *     name="deal-cards-to-players-redirect",
     *     methods={"POST"})
     * @throws \Exception
     */
    public function dealCardsToPlayersRedirect(Request $request)
    {
        return $this->redirectToRoute(
            'deal-cards-to-players',
            ['players' => $request->request->get('players'),
            'numOfCards' => $request->request->get('numOfCards')]
        );
    }
}
