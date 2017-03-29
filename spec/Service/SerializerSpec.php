<?php

namespace spec\AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SerializerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AncaRebeca\FullCalendarBundle\Service\Serializer');
    }

    function it_serialzes_data_successfully(FullCalendarEvent $event1, FullCalendarEvent $event2)
    {
        $event1->toArray()->shouldBeCalled()->willReturn(['title' => 'Event 1', 'start' => '20/01/2015']);
        $event2->toArray()->shouldBeCalled()->willReturn(['title' => 'Event 2', 'start' => '21/01/2015']);

        $this
            ->serialize([$event1, $event2])
            ->shouldReturn('[{"title":"Event 1","start":"20\/01\/2015"},{"title":"Event 2","start":"21\/01\/2015"}]');
    }

    function it_serialzes_should_return_emtpy_if_events_are_empty()
    {
        $this->serialize([])->shouldReturn('[]');
    }
}
