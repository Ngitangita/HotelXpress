<?php

namespace App\Repository;

use App\Entity\Media;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class MediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Media::class);
    }

    public function findById(int $id): array
    {
       return $this->findBy(["id" => $id]);
    }

    public function updateMedia(int $id, string $urlMedia): int
    {
        return $this->createQueryBuilder("m")
            ->update(Media::class, "m")
            ->set("b.urlMedia", ":urlMedia")
            ->where("m.id = :id")
            ->setParameters(["urlMedia" => $urlMedia, "id" => $id])
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this->createQueryBuilder("m")
            ->delete(Media::class, "m")
            ->where("m.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }
}
