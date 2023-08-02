<?php

namespace App\Repository;

use App\Entity\GiveHotelFeedback;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GiveHotelFeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GiveHotelFeedback::class);
    }

    public function showAllFeedBackHotel(): array
    {
        return $this
            ->createQueryBuilder("fh")
            ->getQuery()
            ->getScalarResult();
    }

    public function countFeedBackNegative():array {
        return $this
            ->createQueryBuilder("fh")
            ->select("count(fh) as feedBackNegative")
            ->where("fh.note < :value")
            ->setParameter("value", 0)
            ->getQuery()
            ->getScalarResult();
    }

    public function showOneFeedBack(int $id):array {
        return $this
            ->createQueryBuilder("fh")
            ->where("fh.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function countFeedBackPositive():array {
        return $this
            ->createQueryBuilder("fh")
            ->select("count(fh) as feedBackPositive")
            ->where("fh.note > :value")
            ->setParameter("value", 0)
            ->getQuery()
            ->getScalarResult();
    }

    public function countFeedBackZero(): array  {
        return $this
            ->createQueryBuilder("fh")
            ->select("count(fh) as feedBackZero")
            ->where("fh.note = :value")
            ->setParameter("value", 0)
            ->getQuery()
            ->getScalarResult();
    }


    public function update(int $id, string $textBody, int $note, DateTimeInterface $dateFeedback): int {
        return $this
            ->createQueryBuilder("fh")
            ->update(GiveHotelFeedback::class, "fh")
            ->set("fh.textBody", ":textBody")
            ->set("fh.dateFeedback", ":dateFeedback")
            ->set("fh.note", ":note")
            ->where("fh.id = :id")
            ->setParameters([
                "textBody" => $textBody,
                "dateFeedback" => $dateFeedback,
                "note" => $note,
                "id" => $id
            ])
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("fh")
            ->delete(GiveHotelFeedback::class, "fh")
            ->where("fh.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

}
