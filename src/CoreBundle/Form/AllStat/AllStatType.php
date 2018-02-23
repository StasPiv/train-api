<?php

namespace CoreBundle\Form\AllStat;

use CoreBundle\Model\Request\AllStat\AllStatRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class AllStatType
 */
class AllStatType extends AbstractFormType
{
    const DATA_CLASS = AllStatRequest::class;


}
