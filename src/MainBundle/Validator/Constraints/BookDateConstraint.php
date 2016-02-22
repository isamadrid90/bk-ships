<?php

namespace MainBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;


class BookDateConstraint extends Constraint
{
    /**
     * @return string
     */
    public function getMessage()
    {
        return 'End date should be greater or equals than start date';
    }

    /**
     * @return string
     */
    public function validatedBy()
    {
        return 'valid_book_date';
    }
}