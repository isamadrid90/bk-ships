<?php
/**
 * Created by PhpStorm.
 * User: isagarcar
 * Date: 20/2/16
 * Time: 12:23
 */

namespace MainBundle\Form\Handler;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class BookHandler
{
    public function __construct(EntityManagerInterface $entityManagerInterface)
    {
        $this->em = $entityManagerInterface;
    }

    public function process(Form $form, Request $request)
    {
        if (!$request->isMethod('Post')) {
            return false;
        }

        $form->handleRequest($request);

        if (($form->isSubmitted())&&($form->isValid())) {

            $this->em->flush();
            return true;
        }

        return false;
    }



}