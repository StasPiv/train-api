<?php

namespace CoreBundle\Form\NextApproach;

use CoreBundle\Model\Request\NextApproach\NextApproachRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class NextApproachType
 */
class NextApproachType extends AbstractFormType
{
    const DATA_CLASS = NextApproachRequest::class;


}
