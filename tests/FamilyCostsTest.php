<?php


use PHPUnit\Framework\TestCase;

class FamilyCostsTest extends TestCase
{
    protected Family $family;

    protected function setUp() : void
    {
        parent::setUp();

        $this->family = new Family();
    }


    /**
     * @test
     */
    public function Total()
    {
        $this->family->addMum();
        $this->family->addDad();

        $actual = FamilyCosts::total($this->family);

        $this->assertEquals(400, $actual);
    }

    /**
     * @test
     */
    public function AddGoldfishCost()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addGoldfish();

        $actual = FamilyCosts::addGoldfishCost($this->family, 0);

        $this->assertEquals(2, $actual);
    }

    /**
     * @test
     */
    public function AddDogCost()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addDog();

        $actual = FamilyCosts::addDogCost($this->family, 0);

        $this->assertEquals(15, $actual);
    }

    /**
     * @test
     */
    public function AddMomCost()
    {
        $this->family->addMum();

        $actual = FamilyCosts::addMomCost($this->family, 0);

        $this->assertEquals(200, $actual);
    }

    /**
     * @test
     */
    public function AddChildCost()
    {
        $this->family->addMum();
        $this->family->adaptChild();

        $actual = FamilyCosts::addChildrenCost($this->family, 0);

        $this->assertEquals(150, $actual);
    }

    /**
     * @test
     */
    public function AddChildrenCost()
    {
        $this->family->addMum();
        $this->family->adaptChild();
        $this->family->adaptChild();
        $this->family->adaptChild();

        $actual = FamilyCosts::addChildrenCost($this->family, 0);

        $this->assertEquals(300, $actual);
    }

    /**
     * @test
     */
    public function AddCatCost()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addCat();

        $actual = FamilyCosts::addCatCost($this->family, 0);

        $this->assertEquals(10, $actual);
    }

    /**
     * @test
     */
    public function AddDadCost()
    {
        $this->family->addDad();

        $actual = FamilyCosts::addDadCost($this->family, 0);

        $this->assertEquals(200, $actual);
    }
}
