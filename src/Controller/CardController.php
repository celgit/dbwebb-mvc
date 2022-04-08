<?php

namespace App\Controller;

use App\Cards\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/card/deck", name="deck")
     */
    public function show(): Response
    {
        $emptyDeck = new Deck();
        $filledDeck = $emptyDeck->createNewDeck();



        $data = [
            'deck' => $filledDeck
        ];
        return $this->render('card/deck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/shuffle", name="shuffle-deck")
     */
    public function shuffle(): Response
    {
        $emptyDeck = new Deck();
        $filledDeck = $emptyDeck->createNewDeck();

        shuffle($filledDeck);

        $data = [
            'deck' => $filledDeck
        ];        return $this->render('card/shuffleDeck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw-card")
     */
    public function drawCard(): Response
    {
        $deck = new Deck();
        $deck->createNewDeck();

        $drawnCard = $deck->drawGivenNumOfCards(1);

        $data = [
            'deck' => $deck->getDeck(),
            'drawnCard' => $drawnCard
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw/:number", name="draw-number-of-cards")
     */
    public function drawNumber(): Response
    {
        // Draw number of cards, save as data, send with render as 2nd arg.
        return $this->render('card/draw.html.twig');
    }
}
