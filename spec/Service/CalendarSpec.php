<?php

namespace spec\AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Adapter\CalendarAdapterInterface;
use AncaRebeca\FullCalendarBundle\Service\SerializerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalendarSpec extends ObjectBehavior
{
    function let(SerializerInterface $serializer, CalendarAdapterInterface $adapter)
    {
        $this->beConstructedWith($serializer, $adapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AncaRebeca\FullCalendarBundle\Service\Calendar');
    }

    function it_gets_a_json_string(SerializerInterface $serializer, CalendarAdapterInterface $adapter)
    {
        $startDate = new \DateTime();
        $endDate = new \Datetime();
        $events = [];
        $json = '{}';

        $adapter->getData($startDate, $endDate, [])->shouldBeCalled()->willReturn($events);

        $serializer->serialize($events)->shouldBeCalled()->willReturn($json);

        $this->getData($startDate, $endDate)->shouldReturn($json);
    }
}
