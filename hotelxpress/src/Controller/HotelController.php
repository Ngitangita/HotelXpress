<?php

namespace App\Controller;

use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/hotel")]
class HotelController extends AbstractController
{

    private HotelRepository $repository;

    public function __construct(HotelRepository $repository)
    {

        $this->repository = $repository;
    }

    #[Route("/", name: "hotel.all", methods: ["GET"])]
    public function showAllHotel(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showHotelAll()
        );
    }

    #[Route("/{id<\d+>}", name: "hotel.id", methods: ["GET"])]
    public function showHotelById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findHotelById($id)
        );
    }

    #[Route("/{city<\D+>}", name: "hotel.city", methods: ["GET"])]
    public function showHotelByCity(string $city): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showHotelByCity($city)
        );
    }

    #[Route("/update", name: "hotel.update", methods: ["PUT"])]
    public function updateHotel(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateHotel(
                    $data["h_id"],
                    $data["h_hotelName"],
                    $data["h_address"],
                    $data["h_city"],
                    $data["h_state"],
                    $data["h_phoneNumber"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "hotel.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}