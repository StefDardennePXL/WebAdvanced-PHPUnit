<?php namespace Util;

use PHPUnit\Framework\TestCase;

class LineTest extends TestCase
{
    public function test_construct_validInput_lineObject() {
        $line = new Line(new Point(5, 5), new Point(10, 10));
        $this->assertInstanceOf(Line::class, $line);
    }

    /**
     * @expectedException \Exception
     */
    public function  test_construct_invalidInput_exception() {
        $line = new line("not a point", 12.50);
    }
}