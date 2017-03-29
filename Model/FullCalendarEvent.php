<?php

namespace AncaRebeca\FullCalendarBundle\Model;

abstract class FullCalendarEvent
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @param string $title
     * @param \DateTime $start
     */
    public function __construct($title, \DateTime $start)
    {
        $this->title = $title;
        $this->startDate = $start;
    }

    /**
     * @return array
     */
    abstract public function toArray();
}