<?php

namespace CoreBundle\Model\Request\TrainType;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class TrainTypeUpdateRequest
 *
 * @method bool hasTitle()
 * @method bool hasPriority()
 */
class TrainTypeUpdateRequest extends AbstractRequest implements TrainTypeSingleRequestInterface, TrainTypeAllRequestInterface
{
    use TrainTypeSingleRequestTrait {
        TrainTypeSingleRequestTrait::__construct as constructTraitTrainTypeSingleType;
    }
    use TrainTypeAllRequestTrait {
        TrainTypeAllRequestTrait::__construct as constructTraitTrainTypeAllType;
    }


    /**
     * @inheritDoc
     */
    public function __construct()
    {
    $this->constructTraitTrainTypeSingleType();
    $this->constructTraitTrainTypeAllType();
    }

}
