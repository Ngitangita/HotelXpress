<?php

namespace App\Repository;

use App\Entity\Reservation;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    public function findAllReservation(): array
    {
      return $this
          ->createQueryBuilder("r")
          ->getQuery()
          ->getScalarResult();
    }

    public function findByIdReservation(int $id): array {
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
            ->delete(Reservation::class, "r")
            ->where("r.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }


    public function updateById( int $id,  DateTimeInterface $arrival, DateTimeInterface $departure, DateTimeInterface $dateReservation): int
    {
       return $this
            ->createQueryBuilder("p")
            ->update(Reservation::class, "r")
            ->set("r.arrival", ":arrival")
            ->set("r.departure", ":departure")
            ->set("r.dateReservation", ":dateReservation")
            ->where("r.id = :id")
            ->setParameters([
                "arrival" => $arrival,
                "departure" => $departure,
                "dateReservation" => $dateReservation,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }
}
