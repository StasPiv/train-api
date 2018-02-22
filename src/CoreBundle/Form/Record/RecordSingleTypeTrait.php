<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Entity\Record;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;


/**
 * Trait RecordSingleTypeTrait
 */
trait RecordSingleTypeTrait
{

    /**
     * @param FormEvent $event
     * @return void
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('record', EntityType::class, [
                'class' => Record::class,
                'required' => true,
                'invalid_message' => 'Record is not found',
            ]
        );
    }

}
