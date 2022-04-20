<?php

namespace App\Controller;

use App\game\Deck;
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

        $this->handleResetInput($reset, $start, $session);

        $deck = new Deck();

        $this->prepareDeck($session, $deck);

        /** @var Hand $dealerHand */
        $dealerHand = $session->get('dealerHand', default: new Hand());
        /** @var Hand $playerHand */
        $playerHand = $session->get('playerHand', default: new Hand());

        if ($draw) {
            $this->handleDrawInput($session, $dealerHand, $deck, $playerHand);
        }

        if ($done) {
            $this->handleDoneInput($playerHand, $session, $dealerHand);
        }

        $hands['player'] = $playerHand;
        $hands['dealer'] = $dealerHand;

        $data = [
            'deck' => $deck->getDeck(),
            'players' => $players,
            'numOfCards' => $numOfCards,
            'hands' => $hands,
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

    /**
     * @param Hand $playerHand
     * @param Hand $dealerHand
     * @return string
     */
    private function getWinnerMessage(Hand $playerHand, Hand $dealerHand): string
    {
        $playerHandPoints[] = $playerHand->getHandValue();
        $dealerHandPoints[] = $dealerHand->getHandValue();


        if ($playerHand->handContainsAce()) {
            $playerHandPoints[] = $playerHand->getHandValue() - 13;
        }

        if ($dealerHand->handContainsAce()) {
            $dealerHandPoints[] = $dealerHand->getHandValue() - 13;
        }

        foreach ($playerHandPoints as $playerAceVariant) {
            foreach ($dealerHandPoints as $dealerAceVariant) {
                if (($playerHandPoints < 22) && $playerAceVariant > $dealerAceVariant) {
                    return 'Player wins!';
                }
            }
        }

        return 'Dealer wins!';
    }

    /**
     * @param SessionInterface $session
     * @param Hand $dealerHand
     * @param Deck $deck
     * @param Hand $playerHand
     * @throws Exception
     */
    public function handleDrawInput(SessionInterface $session, Hand $dealerHand, Deck $deck, Hand $playerHand): void
    {
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
     */
    public function handleDoneInput(Hand $playerHand, SessionInterface $session, Hand $dealerHand): void
    {
        if (
            ($playerHand->getHandValue() > 21 &&
                !$playerHand->handContainsAce()) ||
            ($playerHand->getHandValue() > 21 &&
                ($playerHand->getHandValue() - 13) > 21)
        ) {
            $this->addFlash('info', 'Player is bust, dealer wins!');
        } elseif ($session->get('dealersTurn')) {
            if (
                ($dealerHand->getHandValue() > 21 &&
                    !$dealerHand->handContainsAce()) ||
                ($dealerHand->getHandValue() > 21 &&
                    ($dealerHand->getHandValue() - 13) > 21)
            ) {
                $this->addFlash('info', 'Dealer is bust, player wins!');
            } else {
                $endGameMessage = $this->getWinnerMessage($playerHand, $dealerHand);
                $this->addFlash('info', $endGameMessage);
            }
        } else {
            $session->set('dealersTurn', true);
            $this->addFlash('info', 'Player is done, dealers turn');
        }
    }

    /**
     * @param SessionInterface $session
     * @param Deck $deck
     */
    public function prepareDeck(SessionInterface $session, Deck $deck): void
    {
        if ($session->get('deck') === null) {
            $deck->createNewDeck();
            $deck->shuffleDeck();
        } else {
            $deck->addToDeck($session->get('deck'));
        }
    }

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
}
