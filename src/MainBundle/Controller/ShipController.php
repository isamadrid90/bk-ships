<?php

namespace MainBundle\Controller;

use MainBundle\Entity\Ship;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ShipController
 * @package MainBundle\Controller
 */
class ShipController extends Controller
{
    /**
     * @Route("/ship/{id}", name="ships_data")
     *
     * @return JsonResponse
     */
    public function dataAction(Ship $ship)
    {
        $shipData = [
            'id' => $ship->getId(),
            'name' => $ship->getName(),
            'description' => $ship->getDescription(),
            'image' => $ship->getImage(),
            'specifications' => [
                'color' => $ship->getColor(),
                'detection' => $ship->getDetection(),
                'fabrication' => $ship->getFabricationDate(),
                'turbo_boost' => $ship->getTurboBoost(),
                'passengers' => $ship->getPassengers(),
            ]
        ];

        return new JsonResponse($shipData);
    }
}
