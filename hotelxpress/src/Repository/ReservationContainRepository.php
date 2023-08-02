<?php

namespace App\Repository;

use App\Entity\ReservationContain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReservationContainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationContain::class);
    }


    public function findAllReservationContain(): array
    {
        return $this
            ->createQueryBuilder("rc")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array
    {
        return $this
            ->findBy(["id" => $id]);
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("rc")
            ->delete(ReservationContain::class, "rc")
            ->where("rc.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }


    public function updateById(int $id, string $name): int
    {
        return $this
            ->createQueryBuilder("r")
            ->update(ReservationContain::class, "b")
            ->set("r.roomQuantity", ":roomQuantity")
            ->where("r.id = :id")
            ->setParameters([
                "roomQuantity" => $name,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }
}
