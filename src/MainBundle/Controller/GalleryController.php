<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class GalleryController
 * @package MainBundle\Controller
 */
class GalleryController extends Controller
{
    /**
     * @Route("/ship/list", name="ships_list")
     * @return JsonResponse
     */
    public function listAction()
    {
        $shipsRepo = $this->getDoctrine()->getRepository('MainBundle:Ship');
        $list = $shipsRepo->findAll();
        $shipList=[];
        foreach($list as $ship) {
            $shipList[]=[
                'id' => $ship->getId(),
                'name' => $ship->getName(),
                'image' => $ship->getImage()
            ];
        }

        return new JsonResponse(['list'=> $shipList]);
    }
}
