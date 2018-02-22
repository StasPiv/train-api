<?php

namespace CoreBundle\Form\TrainType;

use CoreBundle\Model\Request\TrainType\TrainTypeListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;


/**
 * Class TrainTypeListType
 */
class TrainTypeListType extends AbstractFormGetListType
{
    const DATA_CLASS = TrainTypeListRequest::class;


}
