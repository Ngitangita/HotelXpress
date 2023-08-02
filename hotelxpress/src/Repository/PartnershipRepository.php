<?php

namespace App\Repository;

use App\Entity\Partnership;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PartnershipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partnership::class);
    }


    public function showAllPartnership(): array
    {
       return $this
           ->createQueryBuilder("p")
           ->getQuery()
           ->getScalarResult();
    }


    public function findPartnershipById(int $id): array
    {
        return $this
            ->createQueryBuilder("p")
            ->where("p.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }


    public function update(int $id, DateTimeInterface $dateProposition, string  $partnershipType, bool $isAccepted, string $message): array
    {
        return $this
            ->createQueryBuilder("p")
            ->update(Partnership::class, "p")
            ->set("p.dateProposition", ":dateProposition")
            ->set("p.partnershipType", ":partnershipType")
            ->set("p.isAccepted", ":isAccepted")
            ->set("p.message", ":message")
            ->where("p.id = :id")
            ->setParameters([
                "id" => $id,
                "dateProposition" => $dateProposition,
                "partnershipType" => $partnershipType,
                "isAccepted" => $isAccepted,
                "message" => $message
            ])
            ->getQuery()
            ->execute();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("p")
            ->delete(Partnership::class, "p")
            ->where("p.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

}
