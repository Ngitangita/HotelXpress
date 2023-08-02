<?php

namespace App\Controller;

use App\Repository\RestoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/resto")]
class RestoController extends AbstractController
{

    private RestoRepository $repository;

    public function __construct(RestoRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route("/", name: "resto.all", methods: ["GET"])]
    public function showAll(): JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findAllResto()
        );
    }

    #[Route("/{id<\d+>}", name: "resto.id", methods: ["GET"])]
    public function findById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findById($id)
        );
    }

    #[Route("/update", name: "resto.update", methods: ["PUT"])]
    public function update(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->update(
                    $data["r_id"],
                    $data["r_speciality"],
                    $data["r_restoUrlImg"],
                    $data["r_description"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "promotion.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}