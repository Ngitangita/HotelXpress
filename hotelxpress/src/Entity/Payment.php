<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datePayment = null;

    #[ORM\Column(length: 255)]
    private ?string $methodPayment = null;

    #[ORM\Column]
    private ?float $amountPaid = null;

    #[ORM\ManyToOne(inversedBy: 'payments')]
    private ?Reservation $reservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePayment(): ?\DateTimeInterface
    {
        return $this->datePayment;
    }

    public function setDatePayment(\DateTimeInterface $datePayment): static
    {
        $this->datePayment = $datePayment;

        return $this;
    }

    public function getMethodPayment(): ?string
    {
        return $this->methodPayment;
    }

    public function setMethodPayment(string $methodPayment): static
    {
        $this->methodPayment = $methodPayment;

        return $this;
    }

    public function getAmountPaid(): ?float
    {
        return $this->amountPaid;
    }

    public function setAmountPaid(float $amountPaid): static
    {
        $this->amountPaid = $amountPaid;

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
