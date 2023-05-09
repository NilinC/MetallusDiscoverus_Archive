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

        $nbOfAlbumsToListen = $this->albumRepository->getNumberOfAlbumsAddedToListen();

        $nbAlbumsListenedDuringCurrentMonth = $this->albumRepository->getNumberOfAlbumsListenedInCurrentMonth();

        $nbAlbumsListenedSinceStartOfYear = $this->albumRepository->getNumberAlBumsListenedSinceStartOfYear();

        $nbAlbumsReleasedDuringCurrentMonth = $this->albumRepository->getNbAlbumsReleasedDuringCurrentMonth();

        return $this->render(
            'base.html.twig',
            [
                'list' => $list,
                'nb_albums_to_listen' => $nbOfAlbumsToListen,
                'nb_albums_listened_during_current_month' => $nbAlbumsListenedDuringCurrentMonth,
                'nb_albums_listened_since_start_of_year' => $nbAlbumsListenedSinceStartOfYear,
                'nb_albums_released_during_current_month' => $nbAlbumsReleasedDuringCurrentMonth
            ],
            new Response('OK', Response::HTTP_OK)
        );
    }
}
