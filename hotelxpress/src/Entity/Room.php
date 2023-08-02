<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $roomCategory = null;

    #[ORM\Column(length: 255)]
    private ?string $roomName = null;

    #[ORM\Column(length: 255)]
    private ?string $roomUrlImg = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $pricePerNight = null;

    #[ORM\Column(nullable: true)]
    private ?float $pricePerHour = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    private ?Hotel $hotel = null;

    #[ORM\ManyToMany(targetEntity: RoomContent::class, inversedBy: 'rooms')]
    private Collection $roomContent;

    #[ORM\ManyToMany(targetEntity: Bookmark::class, inversedBy: 'rooms')]
    private Collection $bookmark;

    #[ORM\ManyToOne(inversedBy: 'room')]
    private ?RoomType $roomType = null;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: ReservationContain::class)]
    private Collection $reservationContains;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: GiveRoomFeedback::class)]
    private Collection $giveRoomFeedback;

    public function __construct()
    {
        $this->roomContent = new ArrayCollection();
        $this->bookmark = new ArrayCollection();
        $this->reservationContains = new ArrayCollection();
        $this->giveRoomFeedback = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomCategory(): ?string
    {
        return $this->roomCategory;
    }

    public function setRoomCategory(string $roomCategory): static
    {
        $this->roomCategory = $roomCategory;

        return $this;
    }

    public function getRoomName(): ?string
    {
        return $this->roomName;
    }

    public function setRoomName(string $roomName): static
    {
        $this->roomName = $roomName;

        return $this;
    }

    public function getRoomUrlImg(): ?string
    {
        return $this->roomUrlImg;
    }

    public function setRoomUrlImg(string $roomUrlImg): static
    {
        $this->roomUrlImg = $roomUrlImg;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPricePerNight(): ?float
    {
        return $this->pricePerNight;
    }

    public function setPricePerNight(float $pricePerNight): static
    {
        $this->pricePerNight = $pricePerNight;

        return $this;
    }

    public function getPricePerHour(): ?float
    {
        return $this->pricePerHour;
    }

    public function setPricePerHour(float $pricePerHour): static
    {
        $this->pricePerHour = $pricePerHour;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): static
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * @return Collection<int, RoomContent>
     */
    public function getRoomContent(): Collection
    {
        return $this->roomContent;
    }

    public function addRoomContent(RoomContent $roomContent): static
    {
        if (!$this->roomContent->contains($roomContent)) {
            $this->roomContent->add($roomContent);
        }

        return $this;
    }

    public function removeRoomContent(RoomContent $roomContent): static
    {
        $this->roomContent->removeElement($roomContent);

        return $this;
    }

    /**
     * @return Collection<int, Bookmark>
     */
    public function getBookmark(): Collection
    {
        return $this->bookmark;
    }

    public function addBookmark(Bookmark $bookmark): static
    {
        if (!$this->bookmark->contains($bookmark)) {
            $this->bookmark->add($bookmark);
        }

        return $this;
    }

    public function removeBookmark(Bookmark $bookmark): static
    {
        $this->bookmark->removeElement($bookmark);

        return $this;
    }

    public function getRoomType(): ?RoomType
    {
        return $this->roomType;
    }

    public function setRoomType(?RoomType $roomType): static
    {
        $this->roomType = $roomType;

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
            $reservationContain->setRoom($this);
        }

        return $this;
    }

    public function removeReservationContain(ReservationContain $reservationContain): static
    {
        if ($this->reservationContains->removeElement($reservationContain)) {
            // set the owning side to null (unless already changed)
            if ($reservationContain->getRoom() === $this) {
                $reservationContain->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GiveRoomFeedback>
     */
    public function getGiveRoomFeedback(): Collection
    {
        return $this->giveRoomFeedback;
    }

    public function addGiveRoomFeedback(GiveRoomFeedback $giveRoomFeedback): static
    {
        if (!$this->giveRoomFeedback->contains($giveRoomFeedback)) {
            $this->giveRoomFeedback->add($giveRoomFeedback);
            $giveRoomFeedback->setRoom($this);
        }

        return $this;
    }

    public function removeGiveRoomFeedback(GiveRoomFeedback $giveRoomFeedback): static
    {
        if ($this->giveRoomFeedback->removeElement($giveRoomFeedback)) {
            // set the owning side to null (unless already changed)
            if ($giveRoomFeedback->getRoom() === $this) {
                $giveRoomFeedback->setRoom(null);
            }
        }

        return $this;
    }
}
