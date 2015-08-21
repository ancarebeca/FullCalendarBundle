<?php

namespace AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Model\EventInterface;

interface SerializerInterface
{
    /**
     * @param EventInterface[] $events
     *
     * @return string json
     */
    public function serialize(array $events);
}
