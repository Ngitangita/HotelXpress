<?php

namespace App\Repository;

use App\Entity\Promotion;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PromotionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Promotion::class);
    }

    public function findAllPromotion(): array
    {
        return $this
            ->createQueryBuilder("p")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array
    {
        return $this
            ->createQueryBuilder("p")
            ->where("p.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    
    public function updateById(int $id, DateTimeInterface $startDate,  DateTimeInterface $endDate, float $reduction, string $description): int
    {
        return $this
            ->createQueryBuilder("p")
            ->update(Promotion::class, "p")
            ->set("p.startDate", ":startDate")
            ->set("p.endDate", ":endDate")
            ->set("p.reduction", ":reduction")
            ->set("p.description", ":description")
            ->where("p.id = :id")
            ->setParameters([
                "startDate" => $startDate,
                "endDate" => $endDate,
                "reduction" => $reduction,
                "description" => $description,
                "id" => $id
            ])
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("b")
            ->delete(Promotion::class, "b")
            ->where("b.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }


}
