<?php

use PHPUnit\Framework\TestCase;
use Util\Date;

class DateTest extends TestCase
{
    /**
     * @dataProvider providerValidDates
     */
    public function  test_checkInput_validInput_dateObject($day, $month, $year) {
        $date = Date::make($day, $month, $year);
        $this->assertInstanceOf(Date::class, $date);
    }

    /**
     * @dataProvider providerValidDates
     */
    public function test_printDate_validFormat_string($day, $month, $year) {
        $this->expectOutputString("{$day}/{$month}/{$year}");
        $date = Date::make($day, $month, $year)->printDate();
    }

    /**
     * @dataProvider providerValidDates
     */
    public function test_printMonth_validFormat_string($day, $month, $year) {
        $monthString = Date::$MONTHS[$month-1];
        $this->expectOutputString("{$day}/{$monthString}/{$year}");
        $date = Date::make($day, $month, $year)->printMonth();
    }

    public function test_changeDay_newDateWithChange_dateObject() {
        $newDay = 15;
        $date = Date::make(22, 9, 2000);
        $newDayDate = $date->changeDay($newDay);
        $this->assertEquals($newDay, $newDayDate->getDay());
    }

    public function test_changeMonth_newDateWithChange_dateObject() {
        $newmonth = 5;
        $date = Date::make(22, 9, 2000);
        $newDayDate = $date->changeMonth($newmonth);
        $this->assertEquals($newmonth, $newDayDate->getMonth());
    }

    public function test_changeYear_newDateWithChange_dateObject() {
        $newYear = 1850;
        $date = Date::make(22, 9, 2000);
        $newDayDate = $date->changeYear($newYear);
        $this->assertEquals($newYear, $newDayDate->getYear());
    }

    public function providerValidDates() {
        return array(
            array(22, 9, 2000),
            array(31, 1, 1995),
            array(4, 5, 2020),
        );
    }

    /**
     * @dataProvider providerinvalidDates
     * @expectedException Util\DateException
     */
    public function  test_checkInput_invalidInput_dateException($day, $month, $year) {
        $date = Date::make($day, $month, $year);
    }

    public function providerinvalidDates()
    {
        return array(
            array("", 9, 2000),
            array(35, 2, 1995),
            array(4, -5, 2020),
        );
    }
}