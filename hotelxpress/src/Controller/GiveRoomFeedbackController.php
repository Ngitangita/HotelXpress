<?php

namespace App\Controller;

use App\Repository\GiveRoomFeedbackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/feedback/room")]
class GiveRoomFeedbackController extends AbstractController
{

    private GiveRoomFeedbackRepository $repository;

    public function __construct(GiveRoomFeedbackRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "feedback.room.all", methods: ["GET"])]
    public function getFeedBackRoom(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showAllFeedBackHotel()
        );
    }

    #[Route("/positive", name: "feedback.room.positive", methods: ["GET"])]
    public function getCountFeedBackPositive(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->countFeedBackPositive()
        );
    }

    #[Route("/negative", name: "feedback.room.negative", methods: ["GET"])]
    public function getCountFeedBackNegative(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->countFeedBackNegative()
        );
    }

    #[Route("/zero", name: "feedback.room.zero", methods: ["GET"])]
    public function getCountFeedBackZero(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->countFeedBackZero()
        );
    }

    #[Route("/{id<\d+>}", name: "feedback.room.id", methods: ["GET"])]
    public function getFeedBackRoomById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showOneFeedBack($id)
        );
    }

    #[Route("/delete/{id<\d+>}", name: "feedback.room.delete", methods: ["DELETE"])]
    public function removeFeedBackRoom(int $id): JsonResponse
    {
        return
            $this->json(
                $this
                    ->repository
                    ->deleteById($id)
            );
    }

    #[Route("/update", name: "feedback.room.update", methods: ["PUT"])]
    public function updateRoomFeedback(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this->repository
                ->update($data["fr_id"], $data["fr_textBody"],$data["fr_note"], $data["fr_dateFeedback"])
        );
    }
}