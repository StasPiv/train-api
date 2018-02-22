<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\User;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\NextTrain\NextTrainRequest;


/**
 * Interface NextTrainProcessorInterface
 */
interface NextTrainProcessorInterface extends ProcessorInterface
{

    /**
     * @param NextTrainRequest $request
     * @return User
     */
    public function processPost(NextTrainRequest $request): User;

}
