<?php namespace Util;

class Point
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        if (is_int($x) && is_int($y)) {
            $this->x = $x;
            $this->y = $y;
        } else {
            throw new \Exception("Values must be integers");
        }
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX($x): void
    {
        if (is_int($x)) {
            $this->x = $x;
        } else {
            throw new \Exception("Value must be an integer");
        }
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY($y): void
    {
        if (is_int($y)) {
            $this->y = $y;
        } else {
            throw new \Exception("Value must be an integer");
        }
    }

    public function __toString()
    {
        return "({$this->getX()},{$this->getY()})";
    }


}