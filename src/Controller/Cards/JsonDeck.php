<?php

declare(strict_types=1);

namespace App\Cards;

use Symfony\Component\HttpFoundation\Response;

class JsonDeck extends Deck
{
    /**
     * @throws \JsonException
     */
    public function getJsonDeck(): Response
    {

        $data = [
            'jsondeck' => $this->getDeck()
        ];

        $response = new Response();
        $response->setContent(json_encode($data['jsondeck']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
