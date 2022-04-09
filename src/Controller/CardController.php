<?php

namespace App\Controller;

use App\Cards\Deck;
use App\Cards\Hand;
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
        ];
        return $this->render('card/shuffleDeck.html.twig', $data);
    }

    /**
     * @Route("/card/deck/draw", name="draw-card")
     * @Route(
     *     "/card/deck/draw/{numOfDraws}",
     *     name="draw-number-of-cards",
     *     methods={"GET"})
     * @throws \Exception
     */
    public function drawNumberOfCards(Request $request, SessionInterface $session, int $numOfDraws = 1): Response
    {
        $draw  = $request->request->get('numOfDraws');
        $clear = $request->request->get('clear');

        $hand  = $session->get('hand') ?? new Hand();
        $deck = $session->get("deck") ?? new Deck();

        if ($draw) {
            if (count($deck) < 1) {
                $this->addFlash("error", "Deck is empty!");
            } else {
                $drawnCards = $deck->drawGivenNumOfCards($numOfDraws);

                foreach ($drawnCards as $drawnCard) {
                    $hand->placeCardInHand($drawnCard);
                }

                $this->addFlash("info", "You draw a card and placed it in your hand");
            }
            $session->set("deck", $deck->getDeck());
            $session->set("hand", $hand);
        } elseif ($clear) {
            $this->addFlash("warning", "You've reset the deck.");
            $session->set("deck", $deck->createNewDeck());
            $session->set("hand", $hand->getHand());
        }

        $this->addFlash("info", "Info-message placeholder");

        $numOfGivenDraws = $numOfDraws;




        if ($numOfGivenDraws > 52) {
            $numOfGivenDraws = 52;
        }

        $drawnCards[] = $deck->drawGivenNumOfCards($numOfGivenDraws);

        $data = [
            'deck' => $deck->getDeck(),
            'numOfDraws' => $request->query->get('numOfDraws'),
            'drawnCards' => $drawnCards
        ];

        return $this->render('card/drawMultipleCards.html.twig', $data);
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
}
