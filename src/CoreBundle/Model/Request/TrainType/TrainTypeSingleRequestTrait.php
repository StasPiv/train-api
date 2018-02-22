<?php

namespace CoreBundle\Model\Request\TrainType;

use CoreBundle\Entity\TrainType;


/**
 * Trait TrainTypeSingleRequestTrait
 */
trait TrainTypeSingleRequestTrait
{

    /**
     * @inheritDoc
     */
    public function __construct()
    {
    $this->trainType = new TrainType();
    }

    /**
     * @return TrainType
     */
    public function getTrainType(): TrainType
    {
    return $this->trainType;
    }

    /**
     * @param TrainType $trainType
     * @return TrainTypeSingleRequestInterface|$this
     */
    public function setTrainType(TrainType $trainType): TrainTypeSingleRequestInterface
    {
    $this->trainType = $trainType;
    return $this;
    }

}
