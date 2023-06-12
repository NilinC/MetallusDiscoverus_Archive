<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Album::class);
    }

    public function findAllDescOrderedByReleaseDate(): array
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->select('a.releaseDate', 'a.id', 'a.title', 'a.artist', 'a.genres', 'a.totalTracks', 'a.label', 'a.listenedAt')
            ->orderBy('a.listenedAt, a.releaseDate', 'desc')
        ;

        $query = $queryBuilder->getQuery();

        return $query->execute();
    }

    public function getNumberOfAlbumsAddedToListen(): int
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->select('COUNT(a.title)')
            ->where('a.listenedAt IS NULL')
        ;

        $query = $queryBuilder->getQuery();

        return $query->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }

    public function getNumberOfAlbumsListenedInCurrentMonth(): int
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->select('COUNT(a.title)')
            ->where('a.listenedAt IS NOT NULL')
            ->andWhere('MONTH(a.listenedAt) = MONTH(:now)')
            ->setParameter('now', new \DateTime('now'))
        ;

        $query = $queryBuilder->getQuery();

        return $query->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }

    public function getNumberAlBumsListenedSinceStartOfYear(): int
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->select('COUNT(a.title)')
            ->where('a.listenedAt IS NOT NULL')
            ->andWhere('YEAR(a.listenedAt) = YEAR(:now)')
            ->setParameter('now', new \DateTime('now'))
        ;

        $query = $queryBuilder->getQuery();

        return $query->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }

    public function getNbAlbumsReleasedDuringCurrentMonth(): int
    {
        $queryBuilder = $this
            ->createQueryBuilder('a')
            ->select('COUNT(a.title)')
            ->Where('MONTH(a.releaseDate) = MONTH(:now)')
            ->setParameter('now', new \DateTime('now'))
        ;

        $query = $queryBuilder->getQuery();

        return $query->getResult(Query::HYDRATE_SINGLE_SCALAR);
    }

    public function updateAnAlbumListenedAtValue(int $id, $requestValue): ?Album
    {
        $album = $this->findOneBy(['id' => $id]);

        if (null === $album) {
            throw new \Exception(sprintf('L\'album avec l\'id %d n\'existe pas', $id));
        }

        $param = json_decode($requestValue);

        $listenedAt = null;
        if (null !== $param->listenedAt) {
            $listenedAt = new \DateTime($param->listenedAt);
        }

        $album->setListenedAt($listenedAt);

        $this->entityManager->persist($album);
        $this->entityManager->flush();

        return $album;
    }
}
