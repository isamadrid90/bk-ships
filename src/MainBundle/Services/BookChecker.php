<?php
/**
 * Created by PhpStorm.
 * User: isagarcar
 * Date: 20/2/16
 * Time: 12:01
 */

namespace MainBundle\Services;


use MainBundle\Entity\Ship;

class BookChecker {

    public function checkBookDates(Ship $ship)
    {
        if (($ship->getReservationStartDate() != null ) && ($ship->getReservationEndDate()) != null) {
            return false;
        }

        return true;
    }
}