<?php

namespace App\Repository;

use App\Entity\Bookmark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class BookmarkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bookmark::class);
    }

    public function findAllBookmark(): array
    {
        return $this
            ->createQueryBuilder("b")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array
    {
        return $this
            ->createQueryBuilder("b")
            ->where("b.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function updateById(int $id, string $name): int
    {
        return $this
            ->createQueryBuilder("b")
            ->update(Bookmark::class, "b")
            ->set("b.bookmarkName", ":name")
            ->where("b.id = :id")
            ->setParameters(["name" => $name, "id" => $id])
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("b")
            ->delete(Bookmark::class, "b")
            ->where("b.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }
}
