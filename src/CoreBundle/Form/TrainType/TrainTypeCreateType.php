<?php

namespace CoreBundle\Form\TrainType;

use CoreBundle\Model\Request\TrainType\TrainTypeCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class TrainTypeCreateType
 */
class TrainTypeCreateType extends AbstractFormType
{
    use TrainTypeAllTypeTrait {
        TrainTypeAllTypeTrait::buildForm as buildFormTraitTrainTypeAllType;
    }

    const DATA_CLASS = TrainTypeCreateRequest::class;


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $this->buildFormTraitTrainTypeAllType($builder, $options);
    $this->registerPreSubmitEventListener($builder);
    }

}
