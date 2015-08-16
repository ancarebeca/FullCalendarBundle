<?php

namespace AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Adapter\CalendarAdapterInterface;

class Calendar
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var CalendarAdapterInterface
     */
    protected $adapter;

    /**
     * @param SerializerInterface $serializer
     * @param CalendarAdapterInterface $adapter
     */
    public function __construct(SerializerInterface $serializer, CalendarAdapterInterface $adapter)
    {
        $this->serializer = $serializer;
        $this->adapter = $adapter;
    }

    /**
     * @param \Datetime $startDate
     * @param \DateTime $endDate
     *
     * @return string json
     */
    public function getData(\Datetime $startDate, \DateTime $endDate)
    {
        $events = $this->adapter->getData($startDate, $endDate);

        return $this->serializer->serialize($events);
    }
}