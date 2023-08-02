<?php

namespace App\Repository;

use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);
    }


    public function showRoomAll(): array
    {
        return $this
            ->createQueryBuilder("r")
            ->getQuery()
            ->getScalarResult();
    }

    public function findRoomById(int $id): array
    {
        return $this
            ->createQueryBuilder("h")
            ->where("h.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function updateHotel(
        int $id,
        string $roomName,
        string  $roomCategory,
        string $roomUrlImg,
        string $description,
        float $pricePerNight,
        float $pricePerHour
    ): array
    {
        return $this
            ->createQueryBuilder("r")
            ->update(Room::class, "r")
            ->set("r.roomName", ":roomName")
            ->set("r.roomCategory", ":roomCategory")
            ->set("r.roomUrlImg", ":roomUrlImg")
            ->set("r.description", ":description")
            ->set("r.pricePerNight", ":pricePerNight")
            ->set("r.pricePerHour", ":pricePerHour")
            ->where("r.id = :id")
            ->setParameters([
                "id" => $id,
                "roomName" => $roomName,
                "roomCategory" => $roomCategory,
                "roomUrlImg" => $roomUrlImg,
                "description" => $description,
                "pricePerNight" => $pricePerNight,
                "pricePerHour" => $pricePerHour
            ])
            ->getQuery()
            ->execute();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("r")
            ->delete(Room::class, "r")
            ->where("r.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }
}
