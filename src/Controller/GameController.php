<?php

namespace App\Controller;

use App\Cards\Deck;
use App\Cards\DeckOfJokers;
use App\Cards\JsonDeck;
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

//    /**
//     * @Route(
//     *     "/game/deck/deal/{players}/{numOfCards}",
//     *     name="deal-cards-to-players"
//     * )
//     * @throws Exception
//     */
//    public function startGame(
//        int $players,
//    ): Response {
//        $numOfCards = 2;
//
//        $newDeck = new Deck();
//        $newDeck->createNewDeck();
//
//        $newDeck->shuffleDeck();
//
//        $playerHands = [];
//
//        for ($i = 0; $i < $players; $i++) {
//            $playerHands[] = $newDeck->drawGivenNumOfCards($numOfCards);
//        }
//        $data = [
//            'deck' => $newDeck->getDeck(),
//            'players' => $players,
//            'numOfCards' => $numOfCards,
//            'playerHands' => $playerHands
//        ];
//
//        return $this->render('card/deal-cards-to-players.html.twig', $data);
//    }
//
//    /**
//     * @Route(
//     *     "/card/deck/dealings",
//     *     name="deal-cards-to-players-redirect",
//     *     methods={"POST"})
//     * @throws \Exception
//     */
//    public function dealCardsToPlayersRedirect(Request $request): RedirectResponse
//    {
//        return $this->redirectToRoute(
//            'deal-cards-to-players',
//            ['players' => $request->request->get('players'),
//                'numOfCards' => $request->request->get('numOfCards')]
//        );
//    }
}
