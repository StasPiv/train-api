<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Model\Request\Record\RecordDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class RecordDeleteType
 */
class RecordDeleteType extends AbstractFormType
{
    use RecordSingleTypeTrait;

    const DATA_CLASS = RecordDeleteRequest::class;


}
