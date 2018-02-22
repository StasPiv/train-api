<?php

namespace CoreBundle\Form\TrainType;

use CoreBundle\Model\Request\TrainType\TrainTypeDeleteRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class TrainTypeDeleteType
 */
class TrainTypeDeleteType extends AbstractFormType
{
    use TrainTypeSingleTypeTrait;

    const DATA_CLASS = TrainTypeDeleteRequest::class;


}
