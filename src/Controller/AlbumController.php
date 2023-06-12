<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AlbumController extends AbstractController
{
    public function __construct(
        private readonly AlbumRepository $albumRepository,
        private readonly SerializerInterface $serializer
    ) {}

    #[Route('/album/{id}/listenedAt', name:'app_patch_album_listenedAt', methods: 'PATCH')]
    public function patchAlbumListenedAtAction(Request $request, int $id): Response
    {
        try {
            $album = $this->albumRepository->updateAnAlbumListenedAtValue($id, $request->getContent());
        } catch (\Exception $exception) {
            return new Response($exception->getMessage(), Response::HTTP_NOT_FOUND);
        }

        return new Response($this->serializer->serialize($album, 'json'), Response::HTTP_OK);
    }
}
