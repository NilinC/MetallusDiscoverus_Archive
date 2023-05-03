<?php

namespace App\Controller;

use App\Entity\Album;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function home(EntityManagerInterface $entityManager): Response
    {
        $list = $entityManager
            ->getRepository(Album::class)
            ->findAll()
        ;

        return $this->render(
            'base.html.twig',
            [ 'list' => $list ],
            new Response('OK', Response::HTTP_OK)
        );
    }
}
