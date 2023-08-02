<?php

namespace App\Controller;

use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/promotion")]
class PromotionController extends AbstractController
{

    private PromotionRepository $repository;

    public function __construct(PromotionRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "promotion.all", methods: ["GET"])]
    public function findAll():JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findAllPromotion()
        );
    }

    #[Route("/{id<\d+>}", name: "promotion.id", methods: ["GET"])]
    public function findById(int $id): JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findById($id)
        );
    }

    #[Route("/update", name: "promotion.update", methods: ["PUT"])]
    public function update(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
         return $this->json(
                 $this
                 ->repository
                 ->updateById(
                     $data["h_id"],
                     $data["p_startDate"],
                     $data["p_endDate"],
                     $data["p_reduction"],
                     $data["p_description"]
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

