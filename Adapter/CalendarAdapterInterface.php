<?php

namespace AncaRebeca\FullCalendarBundle\Adapter;

use AncaRebeca\FullCalendarBundle\Model\EventInterface;

interface CalendarAdapterInterface
{
    /**
     * @param \Datetime $startDate
     * @param \Datetime $endDate
     *
     * @return EventInterface[]
     */
    public function getData(\Datetime $startDate, \Datetime $endDate);
}