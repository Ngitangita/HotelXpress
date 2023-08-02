<?php

namespace App\Entity;

use App\Repository\RoomContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomContentRepository::class)]
class RoomContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content_name = null;

    #[ORM\Column(length: 255)]
    private ?string $contentUrlImg = null;

    #[ORM\ManyToMany(targetEntity: Room::class, mappedBy: 'roomContent')]
    private Collection $rooms;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentName(): ?string
    {
        return $this->content_name;
    }

    public function setContentName(string $content_name): static
    {
        $this->content_name = $content_name;

        return $this;
    }

    public function getContentUrlImg(): ?string
    {
        return $this->contentUrlImg;
    }

    public function setContentUrlImg(string $contentUrlImg): static
    {
        $this->contentUrlImg = $contentUrlImg;

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
            $room->addRoomContent($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): static
    {
        if ($this->rooms->removeElement($room)) {
            $room->removeRoomContent($this);
        }

        return $this;
    }
}
