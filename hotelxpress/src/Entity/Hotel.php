<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $hotelName = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'hotels')]
    private Collection $media;

    #[ORM\ManyToMany(targetEntity: Promotion::class, inversedBy: 'hotels')]
    private Collection $promotion;

    #[ORM\ManyToMany(targetEntity: Partnership::class, inversedBy: 'hotels')]
    private Collection $partnership;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Room::class)]
    private Collection $rooms;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: GiveHotelFeedback::class)]
    private Collection $giveHotelFeedback;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->promotion = new ArrayCollection();
        $this->partnership = new ArrayCollection();
        $this->rooms = new ArrayCollection();
        $this->giveHotelFeedback = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHotelName(): ?string
    {
        return $this->hotelName;
    }

    public function setHotelName(string $hotelName): static
    {
        $this->hotelName = $hotelName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        $this->media->removeElement($medium);

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->promotion;
    }

    public function addPromotion(Promotion $promotion): static
    {
        if (!$this->promotion->contains($promotion)) {
            $this->promotion->add($promotion);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): static
    {
        $this->promotion->removeElement($promotion);

        return $this;
    }

    /**
     * @return Collection<int, Partnership>
     */
    public function getPartnership(): Collection
    {
        return $this->partnership;
    }

    public function addPartnership(Partnership $partnership): static
    {
        if (!$this->partnership->contains($partnership)) {
            $this->partnership->add($partnership);
        }

        return $this;
    }

    public function removePartnership(Partnership $partnership): static
    {
        $this->partnership->removeElement($partnership);

        return $this;
    }

    /**
     * @return Collection<int, Room>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Room $room): static
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
            $room->setHotel($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): static
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getHotel() === $this) {
                $room->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GiveHotelFeedback>
     */
    public function getGiveHotelFeedback(): Collection
    {
        return $this->giveHotelFeedback;
    }

    public function addGiveHotelFeedback(GiveHotelFeedback $giveHotelFeedback): static
    {
        if (!$this->giveHotelFeedback->contains($giveHotelFeedback)) {
            $this->giveHotelFeedback->add($giveHotelFeedback);
            $giveHotelFeedback->setHotel($this);
        }

        return $this;
    }

    public function removeGiveHotelFeedback(GiveHotelFeedback $giveHotelFeedback): static
    {
        if ($this->giveHotelFeedback->removeElement($giveHotelFeedback)) {
            // set the owning side to null (unless already changed)
            if ($giveHotelFeedback->getHotel() === $this) {
                $giveHotelFeedback->setHotel(null);
            }
        }

        return $this;
    }
}
