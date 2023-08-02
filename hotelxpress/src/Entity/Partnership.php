<?php

namespace App\Entity;

use App\Repository\PartnershipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnershipRepository::class)]
class Partnership
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateProposition = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $partnershipType = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isAccepted = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'partnerships')]
    private Collection $userId;

    #[ORM\ManyToMany(targetEntity: Hotel::class, mappedBy: 'partnership')]
    private Collection $hotels;

    public function __construct()
    {
        $this->userId = new ArrayCollection();
        $this->hotels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateProposition(): ?\DateTimeInterface
    {
        return $this->dateProposition;
    }

    public function setDateProposition(\DateTimeInterface $dateProposition): static
    {
        $this->dateProposition = $dateProposition;

        return $this;
    }

    public function getPartnershipType(): ?string
    {
        return $this->partnershipType;
    }

    public function setPartnershipType(?string $partnershipType): static
    {
        $this->partnershipType = $partnershipType;

        return $this;
    }

    public function isIsAccepted(): ?bool
    {
        return $this->isAccepted;
    }

    public function setIsAccepted(?bool $isAccepted): static
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->userId;
    }

    public function addUserId(User $userId): static
    {
        if (!$this->userId->contains($userId)) {
            $this->userId->add($userId);
        }

        return $this;
    }

    public function removeUserId(User $userId): static
    {
        $this->userId->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection<int, Hotel>
     */
    public function getHotels(): Collection
    {
        return $this->hotels;
    }

    public function addHotel(Hotel $hotel): static
    {
        if (!$this->hotels->contains($hotel)) {
            $this->hotels->add($hotel);
            $hotel->addPartnership($this);
        }

        return $this;
    }

    public function removeHotel(Hotel $hotel): static
    {
        if ($this->hotels->removeElement($hotel)) {
            $hotel->removePartnership($this);
        }

        return $this;
    }
}
