<?php

namespace App\Repository;

use App\Entity\GiveRoomFeedback;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GiveRoomFeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GiveRoomFeedback::class);
    }

    public function showAllFeedBackHotel(): array
    {
        return $this
            ->createQueryBuilder("fr")
            ->getQuery()
            ->getScalarResult();
    }

    public function countFeedBackNegative(): array
    {
        return $this
            ->createQueryBuilder("fr")
            ->select("count(fr) as feedBackNegative")
            ->where("fr.note < :value")
            ->setParameter("value", 0)
            ->getQuery()
            ->getScalarResult();
    }

    public function showOneFeedBack(int $id): array
    {
        return $this
            ->createQueryBuilder("fr")
            ->where("fr.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function countFeedBackPositive(): array
    {
        return $this
            ->createQueryBuilder("fr")
            ->select("count(fr) as feedBackPositive")
            ->where("fr.note > :value")
            ->setParameter("value", 0)
            ->getQuery()
            ->getScalarResult();
    }

    public function countFeedBackZero(): array
    {
        return $this
            ->createQueryBuilder("fr")
            ->select("count(fr) as feedBackZero")
            ->where("fr.note = :value")
            ->setParameter("value", 0)
            ->getQuery()
            ->getScalarResult();
    }


    public function update(int $id, string $textBody, int $note, DateTimeInterface $dateFeedback): int
    {
        return $this
            ->createQueryBuilder("fr")
            ->update(GiveRoomFeedback::class, "fr")
            ->set("fr.textBody", ":textBody")
            ->set("fr.dateFeedback", ":dateFeedback")
            ->set("fr.note", ":note")
            ->where("fr.id = :id")
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
            ->createQueryBuilder("fr")
            ->delete(GiveRoomFeedback::class, "fr")
            ->where("fr.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }


}
