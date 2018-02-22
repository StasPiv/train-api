<?php

namespace CoreBundle\Form\NextTrain;

use CoreBundle\Model\Request\NextTrain\NextTrainRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class NextTrainType
 */
class NextTrainType extends AbstractFormType
{
    const DATA_CLASS = NextTrainRequest::class;


}
