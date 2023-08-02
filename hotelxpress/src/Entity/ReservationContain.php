<?php

namespace App\Entity;

use App\Repository\ReservationContainRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationContainRepository::class)]
class ReservationContain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $roomQuantity = null;

    #[ORM\ManyToOne(inversedBy: 'reservationContains')]
    private ?Room $room = null;

    #[ORM\ManyToOne(inversedBy: 'reservationContains')]
    private ?Reservation $reservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomQuantity(): ?int
    {
        return $this->roomQuantity;
    }

    public function setRoomQuantity(int $roomQuantity): static
    {
        $this->roomQuantity = $roomQuantity;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): static
    {
        $this->room = $room;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): static
    {
        $this->reservation = $reservation;

        return $this;
    }
}
