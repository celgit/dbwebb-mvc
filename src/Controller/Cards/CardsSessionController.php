<?php

namespace App\Controller\Cards;

use App\Cards\Deck;
use App\Cards\Hand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardsSessionController extends AbstractController
{
    /**
     * @Route(
     *      "/cards/session",
     *      name="cards-session",
     *      methods={"GET","HEAD"}
     * )
     */
    public function session(): Response
    {
        return $this->render('form/drawMultipleCards.html.twig');
    }

    /**
     * @Route(
     *      "/cards/session",
     *      name="cards-session-process",
     *      methods={"POST"}
     * )
     */
    public function sessionProcess(
        Request $request,
        SessionInterface $session
    ): Response {
        $draw  = $request->request->get('numOfDraws');
        $clear = $request->request->get('clear');

        $hand  = $session->get('hand') ?? new Hand();
        $deck = $session->get("deck") ?? new Deck();

        if ($draw) {
            if (count($deck) < 1) { // Deck is empty, error
                $this->addFlash("error", "Deck is empty!");
            } else {

                $this->addFlash("info", "You draw a card and placed it in your hand");
            }
            $session->set("deck", $deck);
            $session->set("hand", $hand);
        } elseif ($clear) {
            $this->addFlash("warning", "You've reset the deck.");
            $session->set("deck", $deck->createNewDeck());
            $session->set("hand", $hand->getHand());
        }

        $this->addFlash("info", "Info-message placeholder");

        return $this->redirectToRoute('draw-number-of-cards');
    }
}
