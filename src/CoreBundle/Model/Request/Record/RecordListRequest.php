<?php

namespace CoreBundle\Model\Request\Record;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RecordListRequest
 */
class RecordListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;


}
