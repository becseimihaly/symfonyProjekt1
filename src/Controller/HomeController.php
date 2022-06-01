<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="karrigen")
     */
    public function home(): Response
    {
        return new Response('Ez a kezdőoldal');
    }

    /**
     * @Route("/browse/{slug}", name="blade")
     */
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Stílus: '.ucfirst(str_replace('-', ' ', $slug));
        } else {
            $title = 'Minden stílus';
        }

        //u()->title(true);
        return new Response($title);
    }
}