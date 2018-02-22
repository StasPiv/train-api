<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Model\Request\Record\RecordReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class RecordReadType
 */
class RecordReadType extends AbstractFormType
{
    use RecordSingleTypeTrait;

    const DATA_CLASS = RecordReadRequest::class;


}
