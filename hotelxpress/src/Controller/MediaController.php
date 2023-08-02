<?php

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/media")]
class MediaController extends AbstractController
{

    private MediaRepository $repository;

    public function __construct(MediaRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "media.all", methods: ["GET"])]
    public function showAll(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findAll()
        );
    }

    #[Route("/{id<\d+>}", name: "media.id", methods: ["GET"])]
    public function findMediaById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findById($id)
        );
    }

    #[Route("/update", name: "media.update", methods: ["PUT"])]
    public function updateHotel(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateMedia(
                    $data["m_id"],
                    $data["m_urlMedia"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "media.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }

}