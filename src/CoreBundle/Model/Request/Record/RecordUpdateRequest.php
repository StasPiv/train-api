<?php

namespace CoreBundle\Model\Request\Record;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RecordUpdateRequest
 *
 * @method bool hasType()
 * @method bool hasTrainNumber()
 * @method bool hasApproachNumber()
 * @method bool hasValue()
 * @method bool hasTime()
 */
class RecordUpdateRequest extends AbstractRequest implements RecordSingleRequestInterface, RecordAllRequestInterface
{
    use RecordSingleRequestTrait {
        RecordSingleRequestTrait::__construct as constructTraitRecordSingleType;
    }
    use RecordAllRequestTrait {
        RecordAllRequestTrait::__construct as constructTraitRecordAllType;
    }


    /**
     * @inheritDoc
     */
    public function __construct()
    {
    $this->constructTraitRecordSingleType();
    $this->constructTraitRecordAllType();
    }

}
