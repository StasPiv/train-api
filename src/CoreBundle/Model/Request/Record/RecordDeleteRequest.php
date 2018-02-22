<?php

namespace CoreBundle\Model\Request\Record;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RecordDeleteRequest
 *
 * @method bool hasRecord()
 */
class RecordDeleteRequest extends AbstractRequest implements RecordSingleRequestInterface
{
    use RecordSingleRequestTrait;


}
