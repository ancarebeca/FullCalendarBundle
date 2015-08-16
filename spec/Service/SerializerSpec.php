<?php

namespace spec\AncaRebeca\FullCalendarBundle\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SerializerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('AncaRebeca\FullCalendarBundle\Service\Serializer');
    }
}
