<?php

namespace AncaRebeca\FullCalendarBundle\Model;

interface EventInterface
{
    /**
     * @param string $title
     * @param \DateTime $start
     */
    public function __construct($title, \DateTime $start);

    /**
     * @return array
     */
    public function toArray();

}