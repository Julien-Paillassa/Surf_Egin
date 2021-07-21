<?php

namespace App\Entity;

use App\Repository\SpotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpotRepository::class)
 */
class Spot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coordinate;

    /**
     * @ORM\ManyToOne(targetEntity=SpotType::class, inversedBy="spots")
     */
    private $spotType;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="spot")
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity=Rating::class, mappedBy="spot")
     */
    private $ratings;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="favoriteSpots")
     */
    private $users;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->ratings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCoordinate(): ?string
    {
        return $this->coordinate;
    }

    public function setCoordinate(?string $coordinate): self
    {
        $this->coordinate = $coordinate;

        return $this;
    }

    public function getSpotType(): ?SpotType
    {
        return $this->spotType;
    }

    public function setSpotType(?SpotType $spotType): self
    {
        $this->spotType = $spotType;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setSpot($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getSpot() === $this) {
                $picture->setSpot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rating[]
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Rating $rating): self
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings[] = $rating;
            $rating->setSpot($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getSpot() === $this) {
                $rating->setSpot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addFavoriteSpot($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeFavoriteSpot($this);
        }

        return $this;
    }
}
