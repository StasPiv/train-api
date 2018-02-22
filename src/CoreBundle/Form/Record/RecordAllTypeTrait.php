<?php

namespace CoreBundle\Form\Record;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Bukashk0zzz\TimestampTypeBundle\Form\Type\TimestampType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use CoreBundle\Entity\TrainType;


/**
 * RecordAllTypeTrait
 */
trait RecordAllTypeTrait
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
                        ->add('trainNumber', IntegerType::class, [
                        'by_reference' => false
                        ])
                        ->add('approachNumber', IntegerType::class, [
                        'by_reference' => false
                        ])
                        ->add('value', NumberType::class, [
                        'by_reference' => false
                        ])
                        ->add('time', TimestampType::class)
                    ->add('type', EntityType::class, [
                    'class' => TrainType::class,
                    'by_reference' => false
                    ]);
    }

}
