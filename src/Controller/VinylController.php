<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/',name: 'app_homepage')]
    public function homepage(Environment $twig):Response
    {

        $tracks = [
            ['song'=>'Gangsta\'s Paradise', 'artist'=>'Coolio'],
            ['song'=>'Waterfalls', 'artist'=>'TLC'],
            ['song'=>'Creep', 'artist'=>'Radiohead'],
            ['song'=>'Kiss from a rose', 'artist'=>'Seal'],
            ['song'=>'On bended Knee', 'artist'=>'Boys II men'],
            ['song'=>'Fantasy', 'artist'=>'Mariah Carey'],
            /*'Gangsta\'s Paradise - Coolio',
            'Waterfalls -TLC',
            'Creep -  Radiohead',
            'Kiss from a rose - Seal',
            'On bended Knee - Boys II men',
            'Fantasy - Mariah Carey',*/
        ];


        return $this->render('vinyl/homepage.html.twig', [
            'title'=>'PB & Jams',
            'tracks'=>$tracks,
            ]);
    }
    /*#[Route('/')]
    public function homepage():Response
    {
        return new Response ('Title: Homepage');
    }*/
    /*#[Route('teste/')]
    public function teste():Response
    {
        return new Response ('Title: Teste');
    }*/
    /*#[Route('/browse/{slug}')]
    public function browse (string $slug = null): Response
    {
        if ($slug){
            $title = u(str_replace('-', '', $slug))->title(true);
        }else{
            $title = 'All Genres';
        }
        return new Response('Genre:'.$title);
    }*/

    #[Route('/browse/{slug}', name:'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}