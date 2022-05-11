<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Tire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $brand;

    #[ORM\Column(type: 'string', length: 255)]
    private string $model;

    #[ORM\Column(type: 'integer', nullable: true)]
    private int $width;

    #[ORM\Column(type: 'integer', nullable: true)]
    private int $profile;

    #[ORM\Column(type: 'integer', nullable: true)]
    private int $rimSize;

    private const PRICE_HUNT_LINK = 'https://www.prisjakt.nu/search?search=';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getProfile(): ?int
    {
        return $this->profile;
    }

    public function setProfile(?int $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getRimSize(): ?int
    {
        return $this->rimSize;
    }

    public function setRimSize(?int $rimSize): self
    {
        $this->rimSize = $rimSize;

        return $this;
    }

    public function getSearchLink()
    {
        $slashString = '%2F';
        $spaceString = ' ';

        return self::PRICE_HUNT_LINK
            . $this->getBrand()
            . $spaceString
            . $this->getModel()
            . $spaceString
            . $this->getWidth()
            . $slashString
            . $this->getProfile()
            . ' R '
            . $this->getRimSize();
    }
}
