<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Model\Request\Record\RecordUpdateRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class RecordUpdateType
 */
class RecordUpdateType extends AbstractFormType
{
    use RecordSingleTypeTrait;
    use RecordAllTypeTrait {
        RecordAllTypeTrait::buildForm as buildFormTraitRecordAllType;
    }

    const DATA_CLASS = RecordUpdateRequest::class;


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
