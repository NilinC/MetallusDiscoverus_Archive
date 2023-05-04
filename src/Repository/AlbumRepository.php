<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Album::class);
    }

    public function findAllDescOrderedByReleaseDate(): array
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->select('a.releaseDate', 'a.title', 'a.artist', 'a.genres', 'a.totalTracks', 'a.label')
            ->orderBy('a.releaseDate', 'desc')
        ;

        $query = $queryBuilder->getQuery();

        return $query->execute();
    }
}
