<?php

namespace CoreBundle\Model\Request\TrainType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class TrainTypeReadRequest
 *
 * @method bool hasTrainType()
 */
class TrainTypeReadRequest extends AbstractRequest implements TrainTypeSingleRequestInterface
{
    use TrainTypeSingleRequestTrait;


}
