<?php
/**
 * Created by PhpStorm.
 * User: isagarcar
 * Date: 20/2/16
 * Time: 12:01
 */

namespace MainBundle\Services;


use Doctrine\ORM\EntityManagerInterface;
use MainBundle\Entity\Ship;

class BookCleaner {

    private $em;

    public function __construct(EntityManagerInterface $entityManagerInterface)
    {
        $this->em = $entityManagerInterface;
    }


    public function cleanBookDates(Ship $ship)
    {
        $currentDate = new \DateTime();

        if ($ship->getReservationEndDate() < $currentDate) {
            $ship->setReservationEndDate(null);
            $ship->setReservationStartDate(null);

            $this->em->flush();
        }
    }
}