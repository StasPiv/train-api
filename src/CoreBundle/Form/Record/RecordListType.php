<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Model\Request\Record\RecordListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;


/**
 * Class RecordListType
 */
class RecordListType extends AbstractFormGetListType
{
    const DATA_CLASS = RecordListRequest::class;


}
