<?php
/**
 * Created by PhpStorm.
 * User: isagarcar
 * Date: 20/2/16
 * Time: 13:36
 */

namespace MainBundle\Services;


use MainBundle\Entity\Ship;

class ShipCloner
{
    public function cloneShip(Ship $ship)
    {
        $newShip = clone $ship;
        $newShip->setId(null);
        $newShip->setReservationStartDate(null);
        $newShip->setReservationEndDate(null);
        $newShip->setFabricationDate(new \DateTime());

        return $newShip;
    }
}