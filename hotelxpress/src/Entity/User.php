<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column(length: 1)]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilUrlImg = null;

    #[ORM\Column(length: 255)]
    private ?string $nationality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeInterface $birthdate = null;


    #[ORM\ManyToOne(targetEntity: UserType::class, inversedBy: 'users')]
    #[ORM\JoinColumn]
    private ?UserType $userType = null;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\ManyToMany(targetEntity: Partnership::class, mappedBy: 'userId')]
    private Collection $partnerships;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: Bookmark::class)]
    private Collection $bookmarks;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: GiveRoomFeedback::class)]
    private Collection $giveRoomFeedback;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: GiveHotelFeedback::class)]
    private Collection $giveHotelFeedback;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->partnerships = new ArrayCollection();
        $this->bookmarks = new ArrayCollection();
        $this->giveRoomFeedback = new ArrayCollection();
        $this->giveHotelFeedback = new ArrayCollection();
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param DateTimeInterface|null $startDate
     */
    public function setStartDate(?DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

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

    public function getProfilUrlImg(): ?string
    {
        return $this->profilUrlImg;
    }

    public function setProfilUrlImg(?string $profilUrlImg): static
    {
        $this->profilUrlImg = $profilUrlImg;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getUserType(): ?UserType
    {
        return $this->userType;
    }

    public function setUserType(?UserType $userType): static
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setUserId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUserId() === $this) {
                $reservation->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Partnership>
     */
    public function getPartnerships(): Collection
    {
        return $this->partnerships;
    }

    public function addPartnership(Partnership $partnership): static
    {
        if (!$this->partnerships->contains($partnership)) {
            $this->partnerships->add($partnership);
            $partnership->addUserId($this);
        }

        return $this;
    }

    public function removePartnership(Partnership $partnership): static
    {
        if ($this->partnerships->removeElement($partnership)) {
            $partnership->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Bookmark>
     */
    public function getBookmarks(): Collection
    {
        return $this->bookmarks;
    }

    public function addBookmark(Bookmark $bookmark): static
    {
        if (!$this->bookmarks->contains($bookmark)) {
            $this->bookmarks->add($bookmark);
            $bookmark->setUserId($this);
        }

        return $this;
    }

    public function removeBookmark(Bookmark $bookmark): static
    {
        if ($this->bookmarks->removeElement($bookmark)) {
            // set the owning side to null (unless already changed)
            if ($bookmark->getUserId() === $this) {
                $bookmark->setUserId(null);
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
            $giveRoomFeedback->setUserId($this);
        }

        return $this;
    }

    public function removeGiveRoomFeedback(GiveRoomFeedback $giveRoomFeedback): static
    {
        if ($this->giveRoomFeedback->removeElement($giveRoomFeedback)) {
            // set the owning side to null (unless already changed)
            if ($giveRoomFeedback->getUserId() === $this) {
                $giveRoomFeedback->setUserId(null);
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
            $giveHotelFeedback->setUserId($this);
        }

        return $this;
    }

    public function removeGiveHotelFeedback(GiveHotelFeedback $giveHotelFeedback): static
    {
        if ($this->giveHotelFeedback->removeElement($giveHotelFeedback)) {
            // set the owning side to null (unless already changed)
            if ($giveHotelFeedback->getUserId() === $this) {
                $giveHotelFeedback->setUserId(null);
            }
        }

        return $this;
    }
}
