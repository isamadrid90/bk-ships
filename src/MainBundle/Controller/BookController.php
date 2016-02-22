<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Ship;
use MainBundle\Form\Type\BookShipType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BookController
 * @package MainBundle\Controller
 */
class BookController extends Controller
{
    /**
     * @Route("/ship/book/{id}", name="book_ship")
     *
     * @return JsonResponse
     */
    public function bookAction(Ship $ship, Request $request)
    {
        //comprobar si el enddate que tiene $ship es menor que el dia de hoy y en ese caso poner las fechas de reserva a null
        $this->get('main.services.book_cleaner')->cleanBookDates($ship);

        /*comprobar que la nave esta disponible, si no lo esta devolver un mensaje informativo y no devolver el formularo
         con esto evitamos que se hagan reservas para las mismas fechas pero tampoco dejamos hacer reservas durante el tiempo que
         esta la nave reservada y esto no tiene sentido, se solucionaria teniendo una tabla a parte para las reservas
        */
        $availableShip = $this->get('main.services.book_checker')->checkBookDates($ship);
        if (!$availableShip) {
            //devolver mensaje informativo

            return new JsonResponse([
                'content' => $this->get('translator')->trans("We're sorry but this ship is not available until" . $ship->getReservationEndDate()->format('Y-m-d'))
            ]);
        }

        $bookSubscriber = $this->get('main.form_subscriber.book_date');
        $form = $this->createForm(new BookShipType($bookSubscriber), $ship);

        $handler = $this->get('main.form_handler.book');

        if($handler->process($form, $request)) {
            //devolver mensaje de exito
            return new JsonResponse([
                'content' => $this->get('translator')->trans('Your book was successfully completed')
            ]);
        }

        //devolver el formulario con errores si los hay o limpio si procede
        return new JsonResponse([
            'content' => $this->renderView('MainBundle:Book:book_form.html.twig', ['form' => $form->createView()])
        ]);

    }
}
