<?php

namespace CoreBundle\Model\Request\Record;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RecordCreateRequest
 */
class RecordCreateRequest extends AbstractRequest implements RecordAllRequestInterface
{
    use RecordAllRequestTrait;


}
