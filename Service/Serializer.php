<?php

namespace AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Model\EventInterface;

class Serializer implements SerializerInterface
{
    /**
     * @param array $data
     *
     * @return string json
     */
    public function serialize(array $data)
    {
        $result = [];

        /** @var EventInterface $element */
        foreach ($data as $element) {
            $result[] = $element->toArray();
        }

        return json_encode($result);
    }
}