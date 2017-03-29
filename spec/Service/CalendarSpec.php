<?php

namespace spec\AncaRebeca\FullCalendarBundle\Service;

use AncaRebeca\FullCalendarBundle\Event\CalendarEvent;
use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AncaRebeca\FullCalendarBundle\Service\SerializerInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CalendarSpec extends ObjectBehavior
{
    function let(SerializerInterface $serializer, EventDispatcherInterface $dispatcher)
    {
        $this->beConstructedWith($serializer, $dispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('AncaRebeca\FullCalendarBundle\Service\Calendar');
    }

    function it_gets_a_json_string(
        SerializerInterface $serializer,
        EventDispatcherInterface $dispatcher,
        CalendarEvent $calendarEvent,
        FullCalendarEvent $event
    ) {
        $startDate = new \DateTime();
        $endDate = new \DateTime();
        $events = [$event];
        $json = '{ [events: foo] }';

        $dispatcher
            ->dispatch(CalendarEvent::SET_DATA, Argument::type('AncaRebeca\FullCalendarBundle\Event\CalendarEvent'))
            ->shouldBeCalled()
            ->willReturn($calendarEvent);

        $calendarEvent->getEvents()->shouldBeCalled()->willReturn($events);

        $serializer->serialize($events)->shouldBeCalled()->willReturn($json);

        $this->getData($startDate, $endDate, [])->shouldReturn($json);
    }
}
