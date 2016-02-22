<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Ship;
use MainBundle\Form\Type\BuildShipType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class BuilderController
 * @package MainBundle\Controller
 */
class BuilderController extends Controller
{
    /**
     * @Route("/ship/build/{id}", name="build_ship")
     *
     * @return JsonResponse
     */
    public function buildAction(Ship $ship, Request $request)
    {
        $clonedShip = $this->get('main.services.ship_cloner')->cloneShip($ship);
        $form = $this->createForm(new BuildShipType(), $clonedShip);

        $handler = $this->get('main.form_handler.build');

        if($handler->process($form, $request)) {
            //devolver mensaje de exito
            return new JsonResponse([
                'content' => $this->get('translator')->trans('Your ship was successfully built')
            ]);
        }

        //devolver el formulario con errores si los hay o limpio si procede
        return new JsonResponse([
            'content' => $this->renderView('MainBundle:Book:build_form.html.twig', ['form' => $form->createView()])
        ]);
    }
}
