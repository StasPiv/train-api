<?php

namespace CoreBundle\Form\TrainType;

use CoreBundle\Entity\TrainType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;


/**
 * Trait TrainTypeSingleTypeTrait
 */
trait TrainTypeSingleTypeTrait
{

    /**
     * @param FormEvent $event
     * @return void
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('trainType', EntityType::class, [
                'class' => TrainType::class,
                'required' => true,
                'invalid_message' => 'TrainType is not found',
            ]
        );
    }

}
