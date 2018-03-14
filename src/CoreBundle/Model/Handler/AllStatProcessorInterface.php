<?php

namespace CoreBundle\Model\Handler;

use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\AllStat\AllStatRequest;


/**
 * Interface AllStatProcessorInterface
 */
interface AllStatProcessorInterface extends ProcessorInterface
{

    /**
     * @param AllStatRequest $request
     * @return array
     */
    public function processGet(AllStatRequest $request): array;

}
