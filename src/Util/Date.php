<?php namespace Util;

class Date
{
    private $day;
    private $month;
    private $year;

    public static $MONTHS = array("jan", "feb", "march",
        "april", "may", "june", "july", "aug", "sept", "oct", "nov", "dec");

    public static function make($day = 1, $month = 1, $year = 2008) {
        if(self::validateDate($day, $month, $year)) {
            return new self($day, $month, $year);
        } else {
            throw new DateException("Invalid Date");
        }
    }

    private function __construct($day, $month, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function changeDay($newDay) {
        return self::make($newDay, $this->getMonth(), $this->getYear());
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function changeMonth($newMonth) {
        return self::make($this->getDay(), $newMonth, $this->getYear());
    }

    public function getYear()
    {
        return $this->year;
    }

    public function changeYear($newYear)
    {
        return self::make($this->getDay(), $this->getMonth(), $newYear);
    }

    private function validateDate($day, $month, $year) {
        if(is_numeric($day) && is_numeric($month) && is_numeric($year)) {
            if(($day >= 1 && $day <= 31) &&
                ($month >= 1 && $month <= 12) &&
                ($year >= 0)) {
                return true;
            }
        }
        return false;
    }

    public function printDate() {
        print($this->day . "/" . $this->month . "/" . $this->year);
    }

    public function printMonth() {
        print($this->getDay() . "/" . self::$MONTHS[($this->getMonth()-1)] . "/" . $this->getYear());
    }
}