<?php

namespace MainBundle\Validator;


use MainBundle\Entity\Ship;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class BookDateConstraintValidator extends ConstraintValidator
{
    /**
     * Checks if the passed value is valid.
     *
     * @param Form $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        /** @var Ship $ship */
        $ship = $value->getData();
        $startDate = $ship->getReservationStartDate();
        $endDate = $ship->getReservationEndDate();

        if ($startDate>$endDate){
            $value->addError(new FormError($constraint->getMessage()));
        }

    }


}