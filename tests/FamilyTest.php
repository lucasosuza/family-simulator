<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FamilyTest extends TestCase {
    

    public function testAFamilyShouldHaveACounter(): void
    {
        $this->assertInstanceOf(Family::class, new Family());
    }
}