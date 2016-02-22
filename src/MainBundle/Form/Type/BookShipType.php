<?php

namespace MainBundle\Form\Type;

use MainBundle\Form\EventListener\BookSubscriber;
use \Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookShipType extends AbstractType
{
    /** @var BookSubscriber $subscriber */
    private $subscriber;

    function __construct(BookSubscriber $bookSubscriber)
    {
        $this->subscriber = $bookSubscriber;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $currentDateTime = new \DateTime();
        $currentDateTime->add(\DateInterval::createFromDateString('yesterday'));
        $builder->add('reservationStartDate', 'date', ['constraints' => [new NotBlank(), new Date(), new GreaterThanOrEqual(['value'=> $currentDateTime])]]);
        $builder->add('reservationEndDate', 'date', ['constraints' => [new NotBlank(), new Date(), new GreaterThanOrEqual(['value'=> $currentDateTime])]]);
        $builder->addEventSubscriber($this->subscriber);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Ship'
        ));
    }

}