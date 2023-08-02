<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/reservation")]
class ReservationController extends AbstractController
{

    private ReservationRepository $repository;

    public function __construct(ReservationRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "reservation.all", methods: ["GET"])]
    public function findAllReservation(): JsonResponse
    {
        return $this->json(
            $this->repository
            ->findAllReservation()
        );
    }

    #[Route("/{id<\d+>}", name: "reservation.id", methods: ["GET"])]
    public function findById(int $id): JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findByIdReservation($id)
        );
    }

    #[Route("/delete/{id<\d+>}", name: "reservation.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }

    #[Route("/update", name: "reservation.update", methods: ["PUT"])]
    public function updateById(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateById(
                    $data["r_id"],
                    $data["r_arrival"],
                    $data["r_departure"],
                    $data["r_dateReservation"]
                )
        );
    }

}