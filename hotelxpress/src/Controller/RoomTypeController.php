<?php

namespace App\Controller;

use App\Repository\RoomTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/room/type")]
class RoomTypeController extends AbstractController
{

    private RoomTypeRepository $repository;

    public function __construct(RoomTypeRepository $repository)
    {
        $this->repository = $repository;
    }



    #[Route("/", name: "room.type.all", methods: ["GET"])]
    public function createRouteFindByAll(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findAllRoomType()
        );
    }

    #[Route("/{id<\d+>}", name: "room.type.id", methods: ["GET"])]
    public function createRouteFindById(int $id):JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findById($id)
        );
    }

    #[Route("/update/{id<\d+>}", name: "room.type.update", methods: ["PUT"])]
    public function createRouteUpdate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateById($data["rt_id"], $data["rt_type"])
        );
    }

    #[Route("/delete/{id<\d+>}", name: "room.type.update", methods: ["DELETE"])]
    public function createRouteDelete(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}