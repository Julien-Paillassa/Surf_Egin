<?php

namespace App\Entity;

use App\Repository\SpotTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpotTypeRepository::class)
 */
class SpotType
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
     * @ORM\OneToMany(targetEntity=Spot::class, mappedBy="spotType")
     */
    private $spots;

    /**
     * @ORM\OneToMany(targetEntity=Rating::class, mappedBy="spotType")
     */
    private $ratings;

    public function __construct()
    {
        $this->spots = new ArrayCollection();
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

    /**
     * @return Collection|Spot[]
     */
    public function getSpots(): Collection
    {
        return $this->spots;
    }

    public function addSpot(Spot $spot): self
    {
        if (!$this->spots->contains($spot)) {
            $this->spots[] = $spot;
            $spot->setSpotType($this);
        }

        return $this;
    }

    public function removeSpot(Spot $spot): self
    {
        if ($this->spots->removeElement($spot)) {
            // set the owning side to null (unless already changed)
            if ($spot->getSpotType() === $this) {
                $spot->setSpotType(null);
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
            $rating->setSpotType($this);
        }

        return $this;
    }

    public function removeRating(Rating $rating): self
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getSpotType() === $this) {
                $rating->setSpotType(null);
            }
        }

        return $this;
    }
}
