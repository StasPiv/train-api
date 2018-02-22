<?php

namespace CoreBundle\Model\Request\TrainType;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class TrainTypeListRequest
 */
class TrainTypeListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;


}
