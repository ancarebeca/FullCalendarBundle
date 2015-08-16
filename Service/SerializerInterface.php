<?php

namespace AncaRebeca\FullCalendarBundle\Service;

interface SerializerInterface
{
    /**
     * @param array $data
     *
     * @return string json
     */
    public function serialize(array $data);
}