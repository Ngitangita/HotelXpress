<?php

namespace App\Controller;

use App\Repository\PartnershipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


#[Route("/partnership")]
class PartnershipController extends AbstractController
{
    private PartnershipRepository $repository;

    public function __construct(PartnershipRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "partnership.all", methods: ["GET"])]
    public function showPartnershipAll(): JsonResponse
    {
         return $this->json(
             $this
                 ->repository
                 ->showAllPartnership()
         );
    }

    #[Route("/{id<\d+>}", name: "partnership.id", methods: ["GET"])]
    public function showById(int $id) : JsonResponse
    {
        return $this->json(
            $this
            ->repository
            ->findPartnershipById($id)
        );
    }

    #[Route("/update", name: "partnership.id", methods: ["PUT"])]
    public function update(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->update(
                    $data["h_id"],
                    $data["p_dateProposition"],
                    $data["p_partnershipType"],
                    $data["p_isAccepted"],
                    $data["p_message"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "partnership.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}