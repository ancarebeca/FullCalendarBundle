<?php

namespace AncaRebeca\FullCalendarBundle\Event;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use Symfony\Component\EventDispatcher\Event as EventDispatcher;

class CalendarEvent extends EventDispatcher
{
    const SET_DATA = 'fullcalendar.set_data';

    /**
     * @var \Datetime
     */
    protected $start;

    /**
     * @var \Datetime
     */
    protected $end;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @var FullCalendarEvent[]
     */
    protected $events = [];

    /**
     * @param \Datetime $star
     * @param \Datetime $end
     * @param array $filters
     */
    public function __construct(\Datetime $star, \Datetime $end, array $filters)
    {
        $this->start = $star;
        $this->end = $end;
        $this->filters = $filters;
    }

    /**
     * @return \Datetime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return \Datetime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param FullCalendarEvent $event
     *
     * @return $this
     */
    public function addEvent(FullCalendarEvent $event)
    {
        if (!in_array($event, $this->events, true)) {
            $this->events[] = $event;
        }

        return $this;
    }

    /**
     * @return FullCalendarEvent[]
     */
    public function getEvents()
    {
        return $this->events;
    }
}
