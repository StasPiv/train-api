<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\TrainType;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\TrainType\TrainTypeListRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeCreateRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeReadRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeUpdateRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeDeleteRequest;


/**
 * Interface TrainTypeProcessorInterface
 */
interface TrainTypeProcessorInterface extends ProcessorInterface
{

    /**
     * @param TrainTypeListRequest $request
     * @return array
     */
    public function processGetC(TrainTypeListRequest $request): array;

    /**
     * @param TrainTypeCreateRequest $request
     * @return TrainType
     */
    public function processPost(TrainTypeCreateRequest $request): TrainType;

    /**
     * @param TrainTypeReadRequest $request
     * @return TrainType
     */
    public function processGet(TrainTypeReadRequest $request): TrainType;

    /**
     * @param TrainTypeUpdateRequest $request
     * @return TrainType
     */
    public function processPut(TrainTypeUpdateRequest $request): TrainType;

    /**
     * @param TrainTypeUpdateRequest $request
     * @return TrainType
     */
    public function processPatch(TrainTypeUpdateRequest $request): TrainType;

    /**
     * @param TrainTypeDeleteRequest $request
     * @return TrainType
     */
    public function processDelete(TrainTypeDeleteRequest $request): TrainType;

}
