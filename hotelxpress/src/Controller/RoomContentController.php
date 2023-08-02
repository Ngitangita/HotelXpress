<?php

namespace App\Controller;

use App\Repository\RoomContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/room/content")]
class RoomContentController extends AbstractController
{
    private RoomContentRepository $repository;

    public function __construct(RoomContentRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route("/", name: "room.content.all", methods: ["GET"])]
    public function showAllRoomContent(): JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findAllRoomContent()
        );
    }

    #[Route("/{id<\d+>}", name: "room.content.id", methods: ["GET"])]
    public function findById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findById($id)
        );
    }

    #[Route("/update", name: "room.content.update", methods: ["PUT"])]
    public function update(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->update(
                    $data["rc_id"],
                    $data["rc_contentName"],
                    $data["rc_contentUrlImg"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "room.content.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}