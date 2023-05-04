<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private AlbumRepository $albumRepository;
    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    #[Route('/')]
    public function home(): Response
    {
        $list = $this->albumRepository->findAllDescOrderedByReleaseDate();

        return $this->render(
            'base.html.twig',
            [ 'list' => $list ],
            new Response('OK', Response::HTTP_OK)
        );
    }
}
