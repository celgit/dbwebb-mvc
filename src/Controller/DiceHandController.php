<?php

namespace App\Controller;

use App\Dice\Dice;
use App\Dice\DiceHand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DiceHandController extends AbstractController
{
    /**
     * @Route(
     *      "/dice/hand",
     *      name="dice-hand-home",
     *      methods={"GET","HEAD"}
     * )
     */
    public function home(): Response
    {
        return $this->render('dice/hand.html.twig');
    }

    /**
     * @Route(
     *      "/dice/hand",
     *      name="dice-hand-process",
     *      methods={"POST"}
     * )
     */
    public function process(
        Request $request,
        SessionInterface $session
    ): Response {
        $hand = $session->get("dicehand") ?? new DiceHand();

        $roll  = $request->request->get('roll');
        $add  = $request->request->get('add');
        $clear = $request->request->get('clear');

        if ($roll) {
            /**
             * @phpstan-ignore-next-line
             */
            $hand->roll();
        } elseif ($add) {
            /**
             * @phpstan-ignore-next-line
             */
            $hand->add(new Dice());
        } elseif ($clear) {
            $hand = new DiceHand();
        }

        $session->set("dicehand", $hand);

        /**
         * @phpstan-ignore-next-line
         */
        $this->addFlash("info", "Your dice hand holds " . $hand->getNumberDices() . " dices.");
        /**
         * @phpstan-ignore-next-line
         */
        $this->addFlash("info", "Current values: " . $hand->getAsString());

        return $this->redirectToRoute('dice-hand-home');
    }
}
