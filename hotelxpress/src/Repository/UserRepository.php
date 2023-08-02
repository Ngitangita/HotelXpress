<?php

namespace App\Repository;

use App\Entity\User;
use DateTimeInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function showAllUser(): array
    {
        return $this
            ->createQueryBuilder("u")
            ->getQuery()
            ->getScalarResult();
    }

    public function findById(int $id): array
    {
        return $this
            ->createQueryBuilder("u")
            ->where("u.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }


    public function updateById(
        int $id,
        string $firstname,
        string $lastname,
        string $gender,
        string $email,
        string $phoneNumber,
        string $profilUrlImg,
        string $nationality,
        DateTimeInterface $birthdate,
        string $password
    ): int
    {
        return $this
            ->createQueryBuilder("u")
            ->update(User::class, "u")
            ->set("u.firstname", ":firstname")
            ->set("u.lastname", ":lastname")
            ->set("u.gender", ":gender")
            ->set("u.email", ":email")
            ->set("u.profilUrlImg", ":profilUrlImg")
            ->set("u.phoneNumber", ":phoneNumber")
            ->set("u.nationality", ":nationality")
            ->set("u.birthdate", ":birthdate")
            ->set("u.password", ":password")
            ->where("u.id = :id")
            ->setParameters([
                "firstname" => $firstname,
                "lastname" => $lastname,
                "gender" => $gender,
                "email" => $email,
                "profilUrlImg" => $profilUrlImg,
                "phoneNumber" => $phoneNumber,
                "nationality" => $nationality,
                "birthdate" => $birthdate,
                "password" => $password,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }

    public function deleteById(int $id): int
    {
        return $this
            ->createQueryBuilder("u")
            ->delete(User::class, "u")
            ->where("u.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->execute();
    }
}
