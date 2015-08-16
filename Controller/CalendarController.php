<?php

namespace AncaRebeca\FullCalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function loadAction(Request $request)
    {
        $startDate = new \DateTime($request->get('start'));
        $endDate = new \DateTime($request->get('end'));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        try {
            $content = $this->get('anca_rebeca_full_calendar.service.calendar')->getData($startDate, $endDate);
            $response->setContent($content);
            $response->setStatusCode(Response::HTTP_OK);
        } catch (\Exception $exception) {
            $response->setContent([]);
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        return $response;
    }
}