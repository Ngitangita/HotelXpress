<?php

namespace App\Repository;

use App\Entity\Payment;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Payment::class);
    }

    public function showAll(): array
    {
        return $this
            ->createQueryBuilder("p")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id):array
    {
        return $this
            ->createQueryBuilder("p")
            ->where("p.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function update(int $id, DateTimeInterface $datePayment, string $methodPayment, float $amountPaid): int {
        return $this
            ->createQueryBuilder("p")
            ->update(Payment::class, "p")
            ->set("p.datePayment", ":datePayment")
            ->set("p.methodPayment", ":methodPayment")
            ->set("p.amountPaid", ":amountPaid")
            ->where("p.id = :id")
            ->setParameters([
                "datePayment" => $datePayment,
                "methodPayment" => $methodPayment,
                "amountPaid" => $amountPaid,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("p")
            ->delete(Payment::class, "p")
            ->where("p.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }
}
