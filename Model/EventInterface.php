<?php

namespace AncaRebeca\FullCalendarBundle\Model;

/**
 * Interface EventInterface
 *  @deprecated since version V4.1.0, to be removed in v5.0.0. Use FullCalendarEvent instead
 *
 */
interface EventInterface
{
    /**
     * @param string $title
     * @param \DateTime $start
     *
     */
    public function __construct($title, \DateTime $start);

    /**
     * @return array
     */
    public function toArray();

}