<?php

namespace App\Entity;

use PHPUnit\Framework\TestCase;

class TireTest extends TestCase
{
    /**
     * @var Tire|null
     */
    private ?Tire $tire;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->tire = new Tire(
            'Kumho',
            'V700',
            225,
            45,
            17
        );
    }

    /**
     * @return void
     */
    public function testSetId(): void
    {
        self::assertSame(0, $this->tire->getId());

        $newId = 1337;

        $this->tire->setId($newId);

        self::assertSame($newId, $this->tire->getId());
    }

    /**
     * @return void
     */
    public function testSetBrand(): void
    {
        self::assertSame('Kumho', $this->tire->getBrand());

        $newBrand = 'Michelin';

        $this->tire->setBrand($newBrand);

        self::assertSame($newBrand, $this->tire->getBrand());
    }

    /**
     * @return void
     */
    public function testSetModel(): void
    {
        self::assertSame('V700', $this->tire->getModel());

        $newModel = 'AR-1';

        $this->tire->setModel($newModel);

        self::assertSame($newModel, $this->tire->getModel());
    }

    /**
     * @return void
     */
    public function testSetWidth(): void
    {
        self::assertSame(225, $this->tire->getWidth());
        $newWidth = 295;

        $this->tire->setWidth($newWidth);

        self::assertSame($newWidth, $this->tire->getWidth());
    }

    /**
     * @return void
     */
    public function testSetProfile(): void
    {
        self::assertSame(45, $this->tire->getProfile());

        $newProfile = 35;

        $this->tire->setProfile($newProfile);

        self::assertSame($newProfile, $this->tire->getProfile());
    }

    /**
     * @return void
     */
    public function testSetRimSize(): void
    {
        self::assertSame(17, $this->tire->getRimSize());

        $newRimSize = 19;

        $this->tire->setRimSize($newRimSize);

        self::assertSame($newRimSize, $this->tire->getRimSize());
    }

    /**
     * @return void
     */
    public function testGetTestLink(): void
    {
        $expectedSearchUrl = 'https://www.prisjakt.nu/search?search=Kumho V700 225%2F45 R 17';

        self::assertSame($expectedSearchUrl, $this->tire->getSearchLink());
    }

}
