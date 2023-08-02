<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $arrival = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $departure = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateReservation = null;

    #[ORM\Column]
    private ?bool $isAnnulled = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn]
    private ?User $userId = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Payment::class)]
    private Collection $payments;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: ReservationContain::class)]
    private Collection $reservationContains;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
        $this->reservationContains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrival(): ?\DateTimeInterface
    {
        return $this->arrival;
    }

    public function setArrival(\DateTimeInterface $arrival): static
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getDeparture(): ?\DateTimeInterface
    {
        return $this->departure;
    }

    public function setDeparture(\DateTimeInterface $departure): static
    {
        $this->departure = $departure;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function isIsAnnulled(): ?bool
    {
        return $this->isAnnulled;
    }

    public function setIsAnnulled(bool $isAnnulled): static
    {
        $this->isAnnulled = $isAnnulled;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection<int, Payment>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): static
    {
        if (!$this->payments->contains($payment)) {
            $this->payments->add($payment);
            $payment->setReservation($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): static
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getReservation() === $this) {
                $payment->setReservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationContain>
     */
    public function getReservationContains(): Collection
    {
        return $this->reservationContains;
    }

    public function addReservationContain(ReservationContain $reservationContain): static
    {
        if (!$this->reservationContains->contains($reservationContain)) {
            $this->reservationContains->add($reservationContain);
            $reservationContain->setReservation($this);
        }

        return $this;
    }

    public function removeReservationContain(ReservationContain $reservationContain): static
    {
        if ($this->reservationContains->removeElement($reservationContain)) {
            // set the owning side to null (unless already changed)
            if ($reservationContain->getReservation() === $this) {
                $reservationContain->setReservation(null);
            }
        }

        return $this;
    }
}
