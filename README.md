## FullCalendarBundle

[![Build Status](https://travis-ci.org/ancarebeca/FullCalendarBundle.svg)](https://travis-ci.org/ancarebeca/FullCalendarBundle)

This bundle allow you to integrate [FullCalendar.js](http://fullcalendar.io/) library in your Symfony3.

## Requirements
* FullCalendar.js v3.1.0
* Symfony v3.1+
* PHP v5.5+
* PHPSpec 

Installation
------------
Installation process:

1. [Download FullCalendarBundle using composer](#download-fullcalendarbundle)
2. [Enable bundle](#enable-bundle)
3. [Create your Event class](#create-event)
4. [Create your listener](#create-listener)
5. [Add styles and scripts in your template](#styles-scripts)
6. [Add Routing](#routing)

### 1. Download FullCalendarBundle using composer <a id="download-fullcalendarbundle"></a>

```bash
$> composer require ancarebeca/full-calendar-bundle
```

### 2. Enable bundle <a id="download-fullcalendarbundle"></a>

```php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        // ...
        new AncaRebeca\FullCalendarBundle\FullCalendarBundle(),
    );
}
```
### 3. Create your Calendar Event class <a id="create-event"></a>

```php
// src/AppBundle/Entity/EventCustom.php

<?php

namespace AppBundle\Entity;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;

class CalendarEvent extends FullCalendarEvent
{
	// Your fields 
}
```

### 4. Create your listener <a id="create-listener"></a>
You need to create your listener/subscriber class in order to load your events data in the calendar.

```yml
// service.yml
services:
   app_bundle.service.listener:
        class: AppBundle\Listener\LoadDataListener
	tags:
   		- { name: 'kernel.event_listener', event: 'fullcalendar.set_data', method: loadData }

```

This listener is called when the event 'fullcalendar.set_data' is launched, for this reason you will need add this in your service.yml.

```php
// src/AppBundle/Listener/LoadDataListener.php

<?php

namespace AppBundle\Listener;

use AncaRebeca\FullCalendarBundle\Model\FullCalendarEvent;
use AppBundle\Entity\CalendarEvent as MyCustomEvent;

class LoadDataListener
{
    /**
     * @param CalendarEvent $calendarEvent
     *
     * @return FullCalendarEvent[]
     */
    public function loadData(CalendarEvent $calendarEvent)
    {
    	 $startDate = $calendarEvent->getStart();
   		 $endDate = $calendarEvent->getEnd();
		 $filters = $calendarEvent->getFilters();
	
    	 //You may want do a custom query to populate the events
    	 
    	 $calendarEvent->addEvent(new MyCustomEvent('Event Title 1', new \DateTime()));
    	 $calendarEvent->addEvent(new MyCustomEvent('Event Title 2', new \DateTime()));
    }
}
```

### 5. Add styles and scripts in your template <a id="styles-scripts"></a>

Add html template to display the calendar:

```twig
{% block body %}
    {% include '@FullCalendar/Calendar/calendar.html.twig' %}
{% endblock %}
```

Add styles:

```twig
{% block stylesheets %}
    <link rel="stylesheet" href="{{ asset('bundles/fullcalendar/css/fullcalendar/fullcalendar.min.css') }}" />
{% endblock %}
```

Add javascript:

```twig
{% block javascripts %}
    <script type="text/javascript" src="{{ asset('bundles/fullcalendar/js/fullcalendar/lib/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundles/fullcalendar/js/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundles/fullcalendar/js/fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bundles/fullcalendar/js/fullcalendar/fullcalendar.default-settings.js') }}"></script>
{% endblock %}
```

Install assets

```bash
$> php bin/console assets:install web
```

### 6. Define routes by default <a id="routing"></a>

```yml
# app/config/routing.yml

ancarebeca_fullcalendar:
    resource: "@FullCalendarBundle/Resources/config/routing.yml"
```

# Extending Basic functionalities

## Extending the Calendar Javascript
If you want to customize the FullCalendar javascript you can copy the fullcalendar.default-settings.js in YourBundle/Resources/public/js, and add your own logic:

```javascript
$(function () {
	$('#calendar-holder').fullCalendar({
		header: {
		    left: 'prev, next',
		    center: 'title',
		    right: 'month, agendaWeek, agendaDay'
		},
		timezone: ('Europe/London'),
		businessHours: {
		    start: '09:00',
		    end: '17:30',
		    dow: [1, 2, 3, 4, 5]
		},
		allDaySlot: false,
		defaultView: 'agendaWeek',
		lazyFetching: true,
		firstDay: 1,
		selectable: true,
		timeFormat: {
		    agenda: 'h:mmt',
		    '': 'h:mmt'
		},
		columnFormat:{
		    month: 'ddd',
		    week: 'ddd D/M',
		    day: 'dddd'
		},
		editable: true,
		eventDurationEditable: true,
		eventSources: [
		{
			url: /full-calendar/load,
			type: 'POST',
			data: {
				filters: { param: foo }
			}
			error: function() {
			   //alert()
			}
		}
]
```

Contribute and feedback
-------------------------

Any feedback and contribution will be very appreciated.
