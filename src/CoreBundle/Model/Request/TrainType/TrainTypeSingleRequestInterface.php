<?php

namespace CoreBundle\Model\Request\TrainType;

use CoreBundle\Entity\TrainType;


/**
 * Interface TrainTypeSingleRequestInterface
 */
interface TrainTypeSingleRequestInterface
{

    /**
     * @return TrainType
     */
    public function getTrainType(): TrainType;

    /**
     * @param TrainType $trainType
     * @return self
     */
    public function setTrainType(TrainType $trainType): self;

}
