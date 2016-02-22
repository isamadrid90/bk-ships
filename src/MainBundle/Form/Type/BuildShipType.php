<?php

namespace MainBundle\Form\Type;

use MainBundle\Form\EventListener\BookSubscriber;
use \Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BuildShipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('color', 'text', ['constraints' => [new NotBlank(), new Length(['min'=> 6, 'max'=> 6])], 'attr'=>['maxlength' => 6]]);
        $builder->add('detection', 'choice',
            ['choices' =>[
                true => 'Activated',
                false => 'Deactivated'
                ],
            'expanded' => true,
            'constraints' => [new NotBlank()]
            ]
        );
        $builder->add('turboBoost', 'choice',
            ['choices' =>[
                true => 'Activated',
                false => 'Deactivated'
                ],
            'expanded' => true,
            'constraints' => [new NotBlank()]
            ]
        );
        $builder->add('passengers', 'integer', ['constraints' => [new NotBlank()]]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MainBundle\Entity\Ship'
        ));
    }

}