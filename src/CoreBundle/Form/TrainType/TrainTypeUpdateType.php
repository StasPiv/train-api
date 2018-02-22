<?php

namespace CoreBundle\Form\TrainType;

use CoreBundle\Model\Request\TrainType\TrainTypeUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class TrainTypeUpdateType
 */
class TrainTypeUpdateType extends AbstractFormType
{
    use TrainTypeSingleTypeTrait;
    use TrainTypeAllTypeTrait {
        TrainTypeAllTypeTrait::buildForm as buildFormTraitTrainTypeAllType;
    }

    const DATA_CLASS = TrainTypeUpdateRequest::class;


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
