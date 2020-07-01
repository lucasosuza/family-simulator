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
        $this->assertFalse($this->family->hasDad());
    }

    /**
     * @test
     */
    public function shouldAddADad()
    {
        $this->family->addDad();
        $this->assertTrue($this->family->hasDad());
    }

    /**
     * @test
     */
    public function shouldAddReturnErrorStringWhenAddingTwoDads()
    {
        $this->expectOutputString('ERROR: The family already has a dad. (No support for modern families yet. :))');
        $this->family->addDad();
        $this->family->addDad();
        $this->assertEquals(1, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldHaveMum(): void
    {
        $this->assertClassHasAttribute('mum', Family::class);
        $this->assertFalse($this->family->hasMum());
    }

    /**
     * @test
     */
    public function shouldAddAMum()
    {
        $this->family->addMum();
        $this->assertTrue($this->family->hasMum());
    }

    /**
     * @test
     */
    public function shouldAddReturnErrorStringWhenAddingTwoMums()
    {
        $this->expectOutputString('ERROR: The family already has a mum. (No support for modern families yet. :))');
        $this->family->addMum();
        $this->family->addMum();
        $this->assertEquals(1, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldHaveChildrenAttribute(): void
    {
        $this->assertClassHasAttribute('children', Family::class);
    }

    /**
     * @test
     */
    public function cannotAddChildrenWithoutParents()
    {
        $this->expectOutputString( 'ERROR: No child without a mum and a dad.');
        $this->family->addChild();
    }

    /**
     * @test
     */
    public function cannotAddChildrenWithoutMum()
    {
        $this->expectOutputString( 'ERROR: No child without a mum and a dad.');
        $this->family->addDad();
        $this->family->addChild();
    }

    /**
     * @test
     */
    public function cannotAddChildrenWithoutDad()
    {
        $this->expectOutputString( 'ERROR: No child without a mum and a dad.');
        $this->family->addMum();
        $this->family->addChild();
    }

    /**
     * @test
     */
    public function shouldAddAChild()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addChild();
        $this->assertTrue($this->family->hasChildren());
        $this->assertEquals(3, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldHaveCatAttribute(): void
    {
        $this->assertClassHasAttribute('cat', Family::class);
    }

    /**
     * @test
     */
    public function cannotAddCatsWithoutParents()
    {
        $this->expectOutputString( 'ERROR: No cat without a mum or a dad.');
        $this->family->addCat();
    }

    /**
     * @test
     */
    public function cannotAddCatsWithoutMum()
    {
        $this->expectOutputString( 'ERROR: No cat without a mum or a dad.');
        $this->family->addDad();
        $this->family->addCat();
    }

    /**
     * @test
     */
    public function cannotAddCatsWithoutDad()
    {
        $this->expectOutputString( 'ERROR: No cat without a mum or a dad.');
        $this->family->addMum();
        $this->family->addCat();
    }

    /**
     * @test
     */
    public function shouldAddACat()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addCat();
        $this->assertEquals(3, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldHaveDogAttribute(): void
    {
        $this->assertClassHasAttribute('dog', Family::class);
    }

    /**
     * @test
     */
    public function cannotAddDogsWithoutParents()
    {
        $this->expectOutputString( 'ERROR: No dog without a mum or a dad.');
        $this->family->addDog();
    }

    /**
     * @test
     */
    public function cannotAddDogsWithoutMum()
    {
        $this->expectOutputString( 'ERROR: No dog without a mum or a dad.');
        $this->family->addDad();
        $this->family->addDog();
    }

    /**
     * @test
     */
    public function cannotAddDogsWithoutDad()
    {
        $this->expectOutputString( 'ERROR: No dog without a mum or a dad.');
        $this->family->addMum();
        $this->family->addDog();
    }

    /**
     * @test
     */
    public function shouldAddADog()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addDog();
        $this->assertEquals(3, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldHaveGoldfishAttribute(): void
    {
        $this->assertClassHasAttribute('goldfish', Family::class);
    }

    /**
     * @test
     */
    public function cannotAddGoldfishesWithoutParents()
    {
        $this->expectOutputString( 'ERROR: No goldfish without a mum or a dad.');
        $this->family->addGoldfish();
    }

    /**
     * @test
     */
    public function cannotAddGoldfishesWithoutMum()
    {
        $this->expectOutputString( 'ERROR: No goldfish without a mum or a dad.');
        $this->family->addDad();
        $this->family->addGoldfish();
    }

    /**
     * @test
     */
    public function cannotAddGoldfishesWithoutDad()
    {
        $this->expectOutputString( 'ERROR: No goldfish without a mum or a dad.');
        $this->family->addMum();
        $this->family->addGoldfish();
    }

    /**
     * @test
     */
    public function shouldAddAGoldfish()
    {
        $this->family->addMum();
        $this->family->addDad();
        $this->family->addGoldfish();
        $this->assertEquals(3, $this->family->count());
    }

    /**
     * @test
     */
    public function cannotAdaptChildrenWithoutMum()
    {
        $this->expectOutputString( 'ERROR: No adapted child without a mum.');
        $this->family->addDad();
        $this->family->adaptChild();
    }

    /**
     * @test
     */
    public function shouldAdaptChildrenWithoutDad()
    {
        $this->family->addMum();
        $this->family->adaptChild();
        $this->assertTrue($this->family->hasChildren());
        $this->assertEquals(2, $this->family->count());
    }

    /**
     * @test
     */
    public function shouldVerifyDadPresence()
    {
        $this->assertFalse($this->family->hasDad());
        $this->family->addDad();
        $this->assertTrue($this->family->hasDad());
        $this->assertEquals(1, $this->family->getDad());
    }

    /**
     * @test
     */
    public function shouldVerifyMumPresence()
    {
        $this->assertFalse($this->family->hasMum());
        $this->family->addMum();
        $this->assertTrue($this->family->hasMum());
        $this->assertEquals(1, $this->family->getMum());
    }
}