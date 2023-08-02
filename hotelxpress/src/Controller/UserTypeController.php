<?php

namespace App\Controller;

use App\Repository\UserTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/user/type")]
class UserTypeController extends AbstractController
{

    private UserTypeRepository $repository;

    public function __construct(UserTypeRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route("/", name: "user.type.all", methods: ["GET"])]
    public function showAllUserType(): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->showAll()
        );
    }

    #[Route("/{id<\d+>}", name: "user.type.id", methods: ["GET"])]
    public function showUserTypeById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findByIdUserType($id)
        );
    }


    #[Route("/update", name: "room.update", methods: ["PUT"])]
    public function updateRoom(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->update(
                    $data["ut_id"],
                    $data["ut_userType"]
                )
        );
    }

    #[Route("/delete/{id<\d+>}", name: "user.type.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}