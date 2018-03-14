<?php

namespace CoreBundle\Model\Handler;

use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\Register\RegisterRequest;


/**
 * Interface RegisterProcessorInterface
 */
interface RegisterProcessorInterface extends ProcessorInterface
{

    /**
     * @param RegisterRequest $request
     * @return array
     */
    public function processPost(RegisterRequest $request): array ;

}
