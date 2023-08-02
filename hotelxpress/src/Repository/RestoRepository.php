<?php

namespace App\Repository;

use App\Entity\Resto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RestoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resto::class);
    }


    public function findAllResto(): array
    {
        return $this
            ->createQueryBuilder("r")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array
    {
        return $this
            ->createQueryBuilder("r")
            ->where("r.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("r")
            ->delete(Resto::class, "r")
            ->where("r.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }

    public function update(int $id, string $speciality, string $restoUrlImg, string $description): int {
        return $this
            ->createQueryBuilder("r")
            ->update(Resto::class, "r")
            ->set("r.speciality", ":speciality")
            ->set("r.restoUrlImg", ":restoUrlImg")
            ->set("r.description", ":description")
            ->where("r.id = :id")
            ->setParameters([
                "speciality" => $speciality,
                "restoUrlImg" => $restoUrlImg,
                "description" => $description,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }
}
