<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
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
     * @ORM\OneToMany(targetEntity=Board::class, mappedBy="brand")
     */
    private $boards;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="brand")
     */
    private $pictures;

    public function __construct()
    {
        $this->boards = new ArrayCollection();
        $this->pictures = new ArrayCollection();
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
     * @return Collection|Board[]
     */
    public function getBoards(): Collection
    {
        return $this->boards;
    }

    public function addBoard(Board $board): self
    {
        if (!$this->boards->contains($board)) {
            $this->boards[] = $board;
            $board->setBrand($this);
        }

        return $this;
    }

    public function removeBoard(Board $board): self
    {
        if ($this->boards->removeElement($board)) {
            // set the owning side to null (unless already changed)
            if ($board->getBrand() === $this) {
                $board->setBrand(null);
            }
        }

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
            $picture->setBrand($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getBrand() === $this) {
                $picture->setBrand(null);
            }
        }

        return $this;
    }
}
