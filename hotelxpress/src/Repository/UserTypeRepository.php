<?php

namespace App\Repository;

use App\Entity\UserType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class UserTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserType::class);
    }


    public function showAll(): array
    {
        return $this
            ->createQueryBuilder("ut")
            ->getQuery()
            ->getScalarResult();
    }

    public function findByIdUserType(int $id): array
    {
        return $this
            ->createQueryBuilder("ut")
            ->where("ut.id = :id")
            ->setParameter("id", $id)
            ->getQuery()
            ->getScalarResult();
    }

    public function deleteById(int $id): int{
        return $this
            ->createQueryBuilder("ut")
            ->delete(UserType::class, "ut")
            ->getQuery()
            ->execute();
    }

    public function update(int $id, string $userType): int
    {
        return $this
            ->createQueryBuilder("ut")
            ->update(UserType::class, "ut")
            ->set("ut.userType", ":userType")
            ->where("ut.id = :id")
            ->setParameters([
                "userType" => $userType,
                "id" => $id
            ])
            ->getQuery()
            ->execute();
    }
}
