<?php

namespace App\Entity;

use App\Repository\GiveRoomFeedbackRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiveRoomFeedbackRepository::class)]
class GiveRoomFeedback
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $textBody = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFeedback = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\ManyToOne(inversedBy: 'giveRoomFeedback')]
    private ?User $userId = null;

    #[ORM\ManyToOne(inversedBy: 'giveRoomFeedback')]
    private ?Room $room = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextBody(): ?string
    {
        return $this->textBody;
    }

    public function setTextBody(?string $textBody): static
    {
        $this->textBody = $textBody;

        return $this;
    }

    public function getDateFeedback(): ?\DateTimeInterface
    {
        return $this->dateFeedback;
    }

    public function setDateFeedback(\DateTimeInterface $dateFeedback): static
    {
        $this->dateFeedback = $dateFeedback;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

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

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): static
    {
        $this->room = $room;

        return $this;
    }
}
