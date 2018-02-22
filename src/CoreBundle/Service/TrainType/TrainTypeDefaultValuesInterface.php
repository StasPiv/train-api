<?php

namespace CoreBundle\Service\TrainType;


/**
 * Interface TrainTypeDefaultValuesInterface
 */
interface TrainTypeDefaultValuesInterface
{

    /**
     * @return string
     */
    public function getDefaultTitle(): string;

    /**
     * @return int
     */
    public function getDefaultPriority(): int;

}
