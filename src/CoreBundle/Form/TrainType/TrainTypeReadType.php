<?php

namespace CoreBundle\Form\TrainType;

use CoreBundle\Model\Request\TrainType\TrainTypeReadRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class TrainTypeReadType
 */
class TrainTypeReadType extends AbstractFormType
{
    use TrainTypeSingleTypeTrait;

    const DATA_CLASS = TrainTypeReadRequest::class;


}
