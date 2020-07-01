<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FamilyTest extends TestCase {
    
    public function testShouldHaveCounter(): void
    {
        $family = new Family();

        $this->assertInstanceOf(Family::class, $family);
        $this->assertClassHasAttribute('count', Family::class);
        $this->assertEquals(0, $family->getCount());
    }

    public function testShoudHaveDad() : void {
        $this->assertClassHasAttribute('dad', Family::class);
    }

    public function testShoudHaveMum() : void {
        $this->assertClassHasAttribute('mum', Family::class);
    }

    public function testShoudHaveChildren() : void {
        $this->assertClassHasAttribute('children', Family::class);
    }
    
    public function testShoudHaveCat() : void {
        $this->assertClassHasAttribute('cat', Family::class);
    }
    
    public function testShoudHaveDog() : void {
        $this->assertClassHasAttribute('dog', Family::class);
    }

    public function testShoudHaveGoldfish() : void {
        $this->assertClassHasAttribute('goldfish', Family::class);
    }

}