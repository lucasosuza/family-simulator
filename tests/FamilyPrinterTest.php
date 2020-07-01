<?php


use PHPUnit\Framework\TestCase;

class FamilyPrinterTest extends TestCase
{

    /**
     * @test
     */
    public function shouldReturnEmptyStringDueEmptyFamily()
    {
        $emptyFamily = new Family();
        $this->assertEquals(' ', FamilyPrinter::summary($emptyFamily));
    }

    /**
     * @test
     */
    public function shouldPrintAMomCounter()
    {
        $family = new Family();
        $family->addMum();

        $this->assertStringContainsString('<li>Mum:', FamilyPrinter::summary($family));

    }

    /**
     * @test
     */
    public function shouldPrintADadCounter()
    {
        $family = new Family();
        $family->addDad();

        $this->assertStringContainsString('<li>Dad:', FamilyPrinter::summary($family));

    }


}
