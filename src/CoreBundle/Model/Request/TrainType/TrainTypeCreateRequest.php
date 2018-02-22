<?php

namespace CoreBundle\Model\Request\TrainType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class TrainTypeCreateRequest
 */
class TrainTypeCreateRequest extends AbstractRequest implements TrainTypeAllRequestInterface
{
    use TrainTypeAllRequestTrait;


}
