<?php

namespace AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Model\EventInterface;

class Serializer implements SerializerInterface
{
    /**
     * @param EventInterface[] $events
     *
     * @return string json
     */
    public function serialize(array $events)
    {
        $result = [];

        /** @var EventInterface $event */
        foreach ($events as $event) {
            $result[] = $event->toArray();
        }

        return json_encode($result);
    }
}
