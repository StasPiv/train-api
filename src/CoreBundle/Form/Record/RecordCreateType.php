<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Model\Request\Record\RecordCreateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class RecordCreateType
 */
class RecordCreateType extends AbstractFormType
{
    use RecordAllTypeTrait {
        RecordAllTypeTrait::buildForm as buildFormTraitRecordAllType;
    }

    const DATA_CLASS = RecordCreateRequest::class;


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $this->buildFormTraitRecordAllType($builder, $options);
    $this->registerPreSubmitEventListener($builder);
    }

}
