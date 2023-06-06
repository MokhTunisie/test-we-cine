<?php

namespace App\Infrastructure\Http\Controller;

use App\Application\Handler\GetGenreHandler;
use App\Application\Handler\GetMovieHandler;
use App\Application\Handler\GetVideoHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    public function index(GetMovieHandler $movieHandler, GetGenreHandler $genreHandler, GetVideoHandler $videoHandler): Response
    {
        $genres = $genreHandler->handle();
        $movies = $movieHandler->handle();
        $video = count($movies['movies']) ? $videoHandler->handle($movies['movies'][0]->getId()) : '';

        return $this->render('Default/index.html.twig', [
            'genres' => $genres['genres'],
            'movies' => $movies,
            'video' => $video['video']
        ]);
    }
}
