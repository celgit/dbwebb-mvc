<?php

namespace App\Controller;

use App\Cards\Deck;
use App\Cards\DeckOfJokers;
use App\Cards\JsonDeck;
use App\Controller\game\Hand;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game-home")
     */
    public function gameHome(): Response
    {
        return $this->render('game/home.html.twig');
    }

    /**
     * @Route("/game/doc", name="game-doc")
     */
    public function gameDoc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    /**
     * @Route(
     *     "/game/deck/deal/{players}/{numOfCards}",
     *     name="start-game"
     * )
     * @throws Exception
     */
    public function startGame(
        Request $request,
        SessionInterface $session,
        int $players = 1,
        int $numOfCards = 0
    ): Response {
        $start = $request->request->get('start');
        $done = $request->request->get('done');
        $reset = $request->request->get('reset');
        $draw = $request->request->get('draw');

        $dealerHand = $session->get('dealerHand', default: new Hand());

        if ($reset || $start) {
            $session->clear();
        }

            $deck = new Deck();

        if ($session->get('deck') === null) {
            $deck->createNewDeck();
            $deck->shuffleDeck();
        } else {
            $deck->addToDeck($session->get('deck'));
        }

        /** @var Hand $playerHand */
        $playerHand = $session->get('playerHand', default: new Hand());

        if ($draw) {
            if ($session->get('dealersTurn')) {
                $dealerHand->addToHand($deck->drawGivenNumOfCards(1));
            } else {
                $playerHand->addToHand($deck->drawGivenNumOfCards(1));
            }
        }
        
        if ($done) {
            $this->addFlash('info', 'You pressed stop');
            $session->set('dealersTurn', true);
        }

        $hands['player'] = $playerHand;
        $hands['dealer'] = $dealerHand;

        $data = [
            'deck' => $deck->getDeck(),
            'players' => $players,
            'numOfCards' => $numOfCards,
            'hands' => $hands,
            'playerHandValue' => $playerHand->getHandValue(),
            'dealerHandValue' => $dealerHand->getHandValue()
        ];

        $session->set('playerHand', $playerHand);
        $session->set('dealerHand', $dealerHand);
        $session->set('deck', $deck->getDeck());

        return $this->render('game/game.html.twig', $data);
    }

    /**
     * @Route(
     *     "/card/deck/dealings",
     *     name="start-game-redirect",
     *     methods={"POST"})
     * @throws \Exception
     */
    public function startGameRedirect(Request $request): RedirectResponse
    {
        return $this->redirectToRoute(
            'deal-cards-to-players',
            ['players' => $request->request->get('players'),
                'numOfCards' => $request->request->get('numOfCards')]
        );
    }
}
