<?php

namespace App\Controller;

use App\Repository\BookmarkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/bookmark")]
class BookmarkController extends AbstractController {

    private BookmarkRepository $repository;

    public function __construct(BookmarkRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route("/", name: "bookmark.all", methods: ["GET"])]
    public function createRouteFindByAllBookmark(): JsonResponse
    {
      return $this->json(
        $this
            ->repository
            ->findAllBookmark()
      );
    }

    #[Route("/{id<\d+>}", name: "bookmark.id", methods: ["GET"])]
    public function createRouteFindById(int $id):JsonResponse
    {
       return $this->json(
           $this
               ->repository
               ->findById($id)
       );
    }

    #[Route("/update/{id<\d+>}", name: "bookmark.update", methods: ["PUT"])]
    public function createRouteUpdate(int $id, string $name): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->updateById($id, $name)
        );
    }

    #[Route("/delete/{id<\d+>}", name: "bookmark.update", methods: ["DELETE"])]
    public function createRouteDelete(int $id): JsonResponse
    {
        return $this->json(
            $this
                ->repository
                ->deleteById($id)
        );
    }
}