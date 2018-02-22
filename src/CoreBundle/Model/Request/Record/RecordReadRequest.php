<?php

namespace CoreBundle\Model\Request\Record;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RecordReadRequest
 *
 * @method bool hasRecord()
 */
class RecordReadRequest extends AbstractRequest implements RecordSingleRequestInterface
{
    use RecordSingleRequestTrait;


}
