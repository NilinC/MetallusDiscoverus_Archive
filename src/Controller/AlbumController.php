<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly AlbumRepository $albumRepository
    ) {}

    #[Route('/album/{id}/listenedAt', name:'app_patch_album_listenedAt', methods: 'PATCH')]
    public function patchAlbumListenedAtAction(Request $request, int $id): Response
    {
        $album = $this->albumRepository->findOneBy(['id' => $id]);

        if (null === $album) {
            return new Response('L\'album n\'existe pas', Response::HTTP_NOT_FOUND);
        }

        $param = json_decode($request->getContent());

        $listenedAt = null;
        if (null !== $param->listenedAt) {
            $listenedAt = new \DateTime($param->listenedAt);
        }

        $album->setListenedAt($listenedAt);

        $this->entityManager->persist($album);
        $this->entityManager->flush();

        return new Response('OK', Response::HTTP_OK);
    }
}
