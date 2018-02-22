<?php

namespace CoreBundle\Model\Request\TrainType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class TrainTypeDeleteRequest
 *
 * @method bool hasTrainType()
 */
class TrainTypeDeleteRequest extends AbstractRequest implements TrainTypeSingleRequestInterface
{
    use TrainTypeSingleRequestTrait;


}
