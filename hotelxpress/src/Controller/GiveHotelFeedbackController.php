<?php

namespace App\Controller;

use App\Repository\GiveHotelFeedbackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/feedback/hotel")]
class GiveHotelFeedbackController extends AbstractController
{
    private GiveHotelFeedbackRepository $repository;

    public function __construct(GiveHotelFeedbackRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "feedback.hotel.all", methods: ["GET"])]
    public function getFeedBackHotel(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showAllFeedBackHotel()
        );
    }

    #[Route("/positive", name: "feedback.hotel.positive", methods: ["GET"])]
    public function getCountFeedBackPositive(): JsonResponse
    {
      return $this->json(
          $this
            ->repository
            ->countFeedBackPositive()
      );
    }

    #[Route("/negative", name: "feedback.hotel.negative", methods: ["GET"])]
    public function getCountFeedBackNegative(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->countFeedBackNegative()
        );
    }

    #[Route("/zero", name: "feedback.hotel.zero", methods: ["GET"])]
    public function getCountFeedBackZero(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->countFeedBackZero()
        );
    }

    #[Route("/{id<\d+>}", name: "feedback.hotel.id", methods: ["GET"])]
    public function getFeedBackHotelById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showOneFeedBack($id)
        );
    }

    #[Route("/delete/{id<\d+>}", name: "feedback.hotel.delete", methods: ["DELETE"])]
    public function removeFeedBackHotel(int $id): JsonResponse
    {
        return
        $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }

    #[Route("/update", name: "feedback.hotel.update", methods: ["PUT"])]
    public function updateHotelFeedback(Request $request): JsonResponse
    {
       $data = json_decode($request->getContent(), true);
       return $this->json(
           $this->repository
           ->update($data["fh_id"], $data["fh_textBody"],$data["fh_note"], $data["fh_dateFeedback"])
       );
    }

}