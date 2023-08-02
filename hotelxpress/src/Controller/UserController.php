<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{


    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route("/", name: "user.all", methods: ["GET"])]
    public function findAllUser(): JsonResponse
    {
        return $this->json(
            $this->repository
                ->showAllUser()
        );
    }

    #[Route("/{id<\d+>}", name: "user.id", methods: ["GET"])]
    public function findById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->findById($id)
        );
    }

    #[Route("/delete/{id<\d+>}", name: "user.delete", methods: ["DELETE"])]
    public function deleteById(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }

    #[Route("/update", name: "user.update", methods: ["PUT"])]
    public function updateById(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json(
            $this
                ->repository
                ->updateById(
                    $data["u_id"],
                    $data["u_firstname"],
                    $data["u_lastname"],
                    $data["u_gender"],
                    $data["u_email"],
                    $data["u_phoneNumber"],
                    $data["u_profilUrlImg"],
                    $data["u_nationality"],
                    $data["u_birthdate"],
                    $data["u_password"],
                )
        );
    }

}