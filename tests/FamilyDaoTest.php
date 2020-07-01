<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FamilyDaoTest extends TestCase {

    /**
     * @runInSeparateProcess
     * @test
     */
    public function shouldInitializeEmptyFamily(): void
    {
        $_COOKIE = array();

        $actual = FamilyDao::getFamily();

        $this->assertNotNull($actual);
        $this->assertInstanceOf(Family::class, $actual);
        $this->assertNotNull($_COOKIE['family']);
    }

}

