<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @phpstan-ignore-next-line
 */
#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Tire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = 0;

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

    private const PRICE_HUNT_URL = 'https://www.prisjakt.nu/search?search=';

    /**
     * @param string $brand
     * @param string $model
     * @param int $width
     * @param int $profile
     * @param int $rimSize
     */
    public function __construct(string $brand, string $model, int $width, int $profile, int $rimSize)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->width = $width;
        $this->profile = $profile;
        $this->rimSize = $rimSize;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return $this
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return $this
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     * @return $this
     */
    public function setWidth(?int $width): self
    {
        /**
         * @phpstan-ignore-next-line
         */
        $this->width = $width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProfile(): ?int
    {
        return $this->profile;
    }

    /**
     * @param int|null $profile
     * @return $this
     */
    public function setProfile(?int $profile): self
    {
        /**
         * @phpstan-ignore-next-line
         */
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRimSize(): ?int
    {
        return $this->rimSize;
    }

    /**
     * @param int|null $rimSize
     * @return $this
     */
    public function setRimSize(?int $rimSize): self
    {
        /**
         * @phpstan-ignore-next-line
         */
        $this->rimSize = $rimSize;

        return $this;
    }

    /**
     * @return string
     */
    public function getSearchLink(): string
    {
        $slashString = '%2F';
        $spaceString = ' ';

        return self::PRICE_HUNT_URL
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
