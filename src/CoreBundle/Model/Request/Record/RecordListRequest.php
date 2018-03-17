<?php

namespace CoreBundle\Model\Request\Record;

use CoreBundle\Entity\TrainType;
use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RecordListRequest
 */
class RecordListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;

    /**
     * @var TrainType
     */
    private $type;

    public function __construct()
    {
        $this->type = new TrainType();
    }

    /**
     * @return TrainType
     */
    public function getType(): TrainType
    {
        return $this->type;
    }

    /**
     * @param TrainType $type
     * @return RecordListRequest
     */
    public function setType(TrainType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
