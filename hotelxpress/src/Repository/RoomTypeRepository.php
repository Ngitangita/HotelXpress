<?php

namespace App\Repository;

use App\Entity\RoomType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoomTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomType::class);
    }


    public function findAllRoomType(): array
    {
        return $this
            ->createQueryBuilder("b")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array
    {
        return $this
            ->createQueryBuilder("rt")
            ->where("rt.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function updateById(int $id, string $type): int
    {
        return $this
            ->createQueryBuilder("rt")
            ->update(RoomType::class, "rt")
            ->set("rt.type", ":name")
            ->where("rt.id = :id")
            ->setParameters(["type" => $type, "id" => $id])
            ->getQuery()
            ->execute();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("rt")
            ->delete(RoomType::class, "rt")
            ->where("rt.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }
}
