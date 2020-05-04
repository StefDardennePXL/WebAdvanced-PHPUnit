<?php namespace Util;

class Line
{
    private $startpoint;
    private $endpoint;

    public function __construct($startpoint, $endpoint)
    {
        if($startpoint instanceof Point && $endpoint instanceof Point) {
            $this->startpoint = $startpoint;
            $this->endpoint = $endpoint;
        } else {
            throw new \Exception("values must be of type Point");
        }
    }

    /**
     * @return Point
     */
    public function getStartpoint(): Point
    {
        return $this->startpoint;
    }

    /**
     * @param Point $startpoint
     */
    public function setStartpoint(Point $startpoint): void
    {
        $this->startpoint = $startpoint;
    }

    /**
     * @return Point
     */
    public function getEndpoint(): Point
    {
        return $this->endpoint;
    }

    /**
     * @param Point $endpoint
     */
    public function setEndpoint(Point $endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    public function __toString()
    {
        return "Line from {$this->startpoint->toString()} until {$this->endpoint->toString()}";
    }


}