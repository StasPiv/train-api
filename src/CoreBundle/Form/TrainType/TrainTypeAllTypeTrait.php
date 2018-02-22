<?php

namespace CoreBundle\Form\TrainType;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


/**
 * TrainTypeAllTypeTrait
 */
trait TrainTypeAllTypeTrait
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
                        ->add('title', TextType::class, [
                        'by_reference' => false
                        ])
                        ->add('priority', IntegerType::class, [
                        'by_reference' => false
                        ]);
    }

}
