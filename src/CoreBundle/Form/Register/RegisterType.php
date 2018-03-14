<?php

namespace CoreBundle\Form\Register;

use CoreBundle\Model\Request\Register\RegisterRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class RegisterType
 */
class RegisterType extends AbstractFormType
{
    const DATA_CLASS = RegisterRequest::class;

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
            ->add('password', TextType::class, [
                'by_reference' => false
            ]);
    }
}
