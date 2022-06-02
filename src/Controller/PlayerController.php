<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
    /**
     * @Route("/api/player/{id<\d+>}", name="api/player", methods={"GET"})
     */
    public function getPlayer(int $id): Response
    {
        $player =[
            'id'=>$id,
            'name'=> 'Finn \'Karrigan\' Andersen',
            'link'=> 'https://www.hltv.org/player/429/karrigan'
        ];

        //return new JsonResponse($player);
        return $this->json($player);
    }
}