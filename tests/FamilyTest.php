<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FamilyTest extends TestCase
{

    private Family $family;

    protected function setUp(): void
    {
        $this->family = new Family();
    }

    public function testShouldHaveCounter(): void
    {
        $this->assertInstanceOf(Family::class, $this->family);
        $this->assertClassHasAttribute('count', Family::class);
        $this->assertEquals(0, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldIncrementeCounter(): void
    {
        $this->family->increaseFamily();
        $this->assertEquals(1, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldHaveDadAttribute(): void
    {
        $this->assertClassHasAttribute('dad', Family::class);
        $this->assertEquals(0, $this->family->dad);
    }

    /**
     * @test
     */
    public function shouldAddADad()
    {
        $this->family->addDad();
        $this->assertEquals(1, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldAddReturnErrorStringWhenAddingTwoDads()
    {

        $this->expectOutputString('ERROR: The family already has a mum. (No support for modern families yet. :))');
        $this->family->addDad();
        $this->family->addDad();
        $this->assertEquals(1, $this->family->count());

    }


    public function testShouldHaveMum(): void
    {
        $this->assertClassHasAttribute('mum', Family::class);
    }

    public function testShouldHaveChildren(): void
    {
        $this->assertClassHasAttribute('children', Family::class);
    }

    public function testShouldHaveCat(): void
    {
        $this->assertClassHasAttribute('cat', Family::class);
    }

    public function testShouldHaveDog(): void
    {
        $this->assertClassHasAttribute('dog', Family::class);
    }

    public function testShouldHaveGoldfish(): void
    {
        $this->assertClassHasAttribute('goldfish', Family::class);
    }

}