<?php

namespace MainBundle\Form\EventListener;

use MainBundle\Validator\Constraints\BookDateConstraint;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Validator\RecursiveValidator;

/**
 * Class BookSubscriber
 * @package MainBundle\Form\EventListener
 */
class BookSubscriber implements EventSubscriberInterface
{

    public function __construct(RecursiveValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(FormEvents::POST_SUBMIT => 'postSubmit');
    }

    /**
     * @param FormEvent $event
     */
    public function postSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $constraint = new BookDateConstraint();
        $this->validator->validate($form, $constraint);
    }

}