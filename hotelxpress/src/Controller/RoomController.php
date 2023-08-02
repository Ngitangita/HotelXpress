<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/room")]
class RoomController extends AbstractController
{


    private RoomRepository $repository;

    public function __construct(RoomRepository $repository)
    {

        $this->repository = $repository;
    }

    #[Route("/", name: "room.all", methods: ["GET"])]
    public function showAllHotel(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showRoomAll()
        );
    }

    #[Route("/{id<\d+>}", name: "room.id", methods: ["GET"])]
    public function showRoomById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findRoomById($id)
        );
    }


    #[Route("/update", name: "room.update", methods: ["PUT"])]
    public function updateRoom(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateHotel(
                    $data["r_id"],
                    $data["r_roomName"],
                    $data["r_roomCategory"],
                    $data["r_roomUrlImg"],
                    $data["r_description"],
                    $data["r_pricePerNight"],
                    $data["r_pricePerHour"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "room.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}