<?php

namespace App\Controller;

use App\Repository\ReservationContainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/reservation/contain")]
class ReservationContainController extends AbstractController
{

    private ReservationContainRepository $repository;

    public function __construct(ReservationContainRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "reservation.contain.all", methods: ["GET"])]
    public function findAll(): JsonResponse {
        return $this->json(
            $this
            ->repository
            ->findAllReservationContain()
        );
    }

    #[Route('/{id<\d+>}', name: "reservation.contain.id", methods: ["GET"])]
    public function findById(int $id): JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findById($id)
        );
    }

    #[Route('/delete/{id<\d+>}', name: "reservation.contain.delete", methods: ["DELETE"])]
    public function deleteById(int $id):JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->deleteById($id)
        );
    }

    #[Route('/update', name: "reservation.contain.update", methods: ["PUT"])]
    public function update(Request $request): JsonResponse {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateById(
                    $data["r_id"],
                    $data["r_roomQuantity"]
                )
        );
    }
}