<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(Environment $twig): Response
    {
        return new Response('Ez a kezdőoldal');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homepage(): Response
    {
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
        //dump($classicCars);

        return $this->render('home/homepage.html.twig', [
            'title'=>'Home Page',
            'classicCars'=>$classicCars
        ]);
    }
    /**
     * @Route("/twig", name="twig")
     */
    public function twig(Environment $twig): Response
    {
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
        //dump($classicCars);

        $html = $twig->render('home/twig.html.twig', [
            'title'=>'Twig Page',
            'classicCars'=>$classicCars
        ]);

        return new Response($html);
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

        $genre = $slug ? ucfirst(str_replace('-', ' ', $slug)) : null;

        //u()->title(true);
        return $this->render('home/browse.html.twig', [
            'title'=>'Browse Page',
            'genre'=>$genre]);
    }
}