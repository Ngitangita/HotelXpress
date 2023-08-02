<?php

namespace App\Controller;

use App\Repository\PaymentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/payment")]
class PaymentController extends AbstractController
{

    private PaymentRepository $repository;

    public function __construct(PaymentRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "payment.all", methods: ["GET"])]
    public function createRouteFindByAllBookmark(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showAll()
        );
    }

    #[Route("/{id<\d+>}", name: "payment.id", methods: ["GET"])]
    public function createRouteFindById(int $id):JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findById($id)
        );
    }

    #[Route("/update/{id<\d+>}", name: "payment.update", methods: ["PUT"])]
    public function createRouteUpdate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this->repository
                ->update(
                    $data["p_id"],
                    $data["p_datePayment"],
                    $data["p_methodPayment"],
                    $data["p_amountPaid"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "payment.update", methods: ["DELETE"])]
    public function createRouteDelete(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}