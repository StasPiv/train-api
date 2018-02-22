<?php

namespace CoreBundle\Service\TrainType;


/**
 * Trait TrainTypeDefaultValuesTrait
 */
trait TrainTypeDefaultValuesTrait
{

    /**
     * @return string
     */
    public function getDefaultTitle(): string
    {
        throw new \RuntimeException('You must set title');
    }

    /**
     * @return int
     */
    public function getDefaultPriority(): int
    {
        return 0;
    }

}
