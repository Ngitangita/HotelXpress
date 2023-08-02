<?php

namespace App\Repository;

use App\Entity\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class HotelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

    public function showHotelAll(): array
    {
        return $this
            ->createQueryBuilder("h")
            ->getQuery()
            ->getScalarResult();
    }

    public function showHotelByCity(string $city): array
    {
        return $this
            ->createQueryBuilder("h")
            ->where("h.city = :city")
            ->setParameter("city", $city)
            ->getQuery()
            ->getScalarResult();
    }

    public function findHotelById(int $id): array
    {
      return $this
          ->createQueryBuilder("h")
          ->where("h.id = :id")
          ->setParameter("id", $id)
          ->getQuery()
          ->getScalarResult();
    }

    public function updateHotel(int $id, string $hotelName, string  $address, string $city, string $state, string $phoneNumber): array
    {
        return $this
            ->createQueryBuilder("h")
            ->update(Hotel::class, "h")
            ->set("h.hotelName", ":hotelName")
            ->set("h.address", ":address")
            ->set("h.city", ":city")
            ->set("h.state", ":state")
            ->set("h.phoneNumber", ":phoneNumber")
            ->where("h.id = :id")
            ->setParameters([
                "id" => $id,
                "hotelName" => $hotelName,
                "address" => $address,
                "city" => $city,
                "state" => $state,
                "phoneNumber" => $phoneNumber
            ])
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("h")
            ->delete(Hotel::class, "h")
            ->where("h.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

}
