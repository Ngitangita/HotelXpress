<?php

namespace App\Repository;

use App\Entity\RoomContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoomContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomContent::class);
    }

    public function findAllRoomContent():array
    {
        return $this
            ->createQueryBuilder("rc")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array{
        return $this
            ->createQueryBuilder("rc")
            ->where("rc.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("rc")
            ->delete(RoomContent::class, "rc")
            ->where("rc.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }

    public function update(int $id, string $contentName, string $contentUrlImg): int {
        return $this
            ->createQueryBuilder("rc")
            ->update(RoomContent::class, "rc")
            ->set("rc.contentName", ":contentName")
            ->set("rc.contentUrlImg", ":contentUrlImg")
            ->where("rc.id = :id")
            ->setParameters([
                "contentUrlImg" => $contentUrlImg,
                "contentName" => $contentName,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }
}
