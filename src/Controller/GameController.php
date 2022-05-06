<?php

namespace App\Controller;

use App\game\Card;
use App\game\Deck;
use App\game\Game;
use App\game\Hand;
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
     * @var array<Card>
     */
    private array $hands;

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
        $game = new Game();

        $start = $request->request->get('start');
        $done = $request->request->get('done');
        $reset = $request->request->get('reset');
        $draw = $request->request->get('draw');

        $game->handleResetInput($reset, $start, $session);

        $deck = new Deck();

        $deck->prepareDeck($session);

        /** @var Hand $dealerHand */
        $dealerHand = $session->get('dealerHand', default: new Hand());
        /** @var Hand $playerHand */
        $playerHand = $session->get('playerHand', default: new Hand());

        if ($draw) {
            $game->handleDrawInput($session, $dealerHand, $deck, $playerHand);
        }

        if ($done) {
            $this->addFlash('info', $game->handleDoneInput($playerHand, $session, $dealerHand));
        }

        $this->hands['player'] = $playerHand;
        $this->hands['dealer'] = $dealerHand;

        $data = [
            'deck' => $deck->getDeck(),
            'players' => $players,
            'numOfCards' => $numOfCards,
            'hands' => $this->hands,
            'playerHasAces' => $playerHand->handContainsAce(),
            'dealerHasAces' => $dealerHand->handContainsAce(),
            'playerHandValueAceAs14' => $playerHand->getHandValue(),
            'playerHandValueAceAs1' => $playerHand->getHandValue(true),
            'dealerHandValueAceAs14' => $dealerHand->getHandValue(),
            'dealerHandValueAceAs1' => $dealerHand->getHandValue(true),
        ];

        $session->set('playerHand', $playerHand);
        $session->set('dealerHand', $dealerHand);
        $session->set('deck', $deck->getDeck());

        return $this->render('game/game.html.twig', $data);
    }

    /**
     * @Route(
     *     "/game/deck/dealings",
     *     name="start-game-redirect",
     *     methods={"POST"})
     * @throws Exception
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
