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
     * @Route("/twig", name="twig")
     */
    public function twig(): Response
    {

        $americanLeague = [
            'Rays', 'Yankees', 'Blue Jays', 'Orioles', 'Red Sox', 'Royals', 'Twins',
            'Tigers', 'Indians', 'White Sox', 'Astros', 'Rangers', 'Angels',
            'Mariners', 'Athletics'
        ];

        $classicCars = [
            ['year'=>1953, 'brand'=>'Chevy', 'type'=>'Corvette'],
            ['year'=>1966, 'brand'=>'Ford', 'type'=>'Mustang'],
            ['year'=>1967, 'brand'=>'Pontiac', 'type'=>'GTO'],
            ['year'=>1969, 'brand'=>'Dodge', 'type'=>'Charger'],
            ['year'=>1962, 'brand'=>'Chevy', 'type'=>'Impala'],
            ['year'=>1968, 'brand'=>'Chevy', 'type'=>'Camaro'],
            ['year'=>1962, 'brand'=>'Ford', 'type'=>'Thunderbird'],
            ['year'=>1957, 'brand'=>'Chevy', 'type'=>'Bel Air'],
            ['year'=>1966, 'brand'=>'Lincoln', 'type'=>'Continental']
        ];

        return $this->render('home/twig.html.twig', [
            'title'=>'Twig Page',
            'americanLeague'=>$americanLeague,
            'classicCars'=>$classicCars
        ]);
    }

    /**
     * @Route("/browse/{slug}", name="browse")
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