<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ControllerTest extends TestCase {


    protected function setUp() : void
    {
        $_SESSION = array();
    }

    /**
     * @test
     */
    public function GivenEmptySessionShouldInitializeAFamily(): void
    {
        $actual = Controller::buildFamily();

        $this->assertNotNull($actual);
        $this->assertInstanceOf(Family::class, $actual);
        $this->assertNotNull($_SESSION['family']);
    }

}

