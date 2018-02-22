<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\User;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\NextApproach\NextApproachRequest;


/**
 * Interface NextApproachProcessorInterface
 */
interface NextApproachProcessorInterface extends ProcessorInterface
{

    /**
     * @param NextApproachRequest $request
     * @return User
     */
    public function processPost(NextApproachRequest $request): User;

}
