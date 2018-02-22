<?php

namespace CoreBundle\Form\User;

use Symfony\Component\Form\FormBuilderInterface;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


/**
 * UserAllTypeTrait
 */
trait UserAllTypeTrait
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
                        ->add('name', TextType::class, [
                        'by_reference' => false
                        ])
                        ->add('currentTrain', IntegerType::class, [
                        'by_reference' => false
                        ])
                        ->add('currentApproach', IntegerType::class, [
                        'by_reference' => false
                        ]);
    }

}
