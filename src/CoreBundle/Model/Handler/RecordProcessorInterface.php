<?php

namespace CoreBundle\Model\Handler;

use CoreBundle\Entity\Record;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\Record\RecordListRequest;
use CoreBundle\Model\Request\Record\RecordCreateRequest;
use CoreBundle\Model\Request\Record\RecordReadRequest;
use CoreBundle\Model\Request\Record\RecordUpdateRequest;
use CoreBundle\Model\Request\Record\RecordDeleteRequest;


/**
 * Interface RecordProcessorInterface
 */
interface RecordProcessorInterface extends ProcessorInterface
{

    /**
     * @param RecordListRequest $request
     * @return array
     */
    public function processGetC(RecordListRequest $request): array;

    /**
     * @param RecordCreateRequest $request
     * @return Record
     */
    public function processPost(RecordCreateRequest $request): Record;

    /**
     * @param RecordReadRequest $request
     * @return Record
     */
    public function processGet(RecordReadRequest $request): Record;

    /**
     * @param RecordUpdateRequest $request
     * @return Record
     */
    public function processPut(RecordUpdateRequest $request): Record;

    /**
     * @param RecordUpdateRequest $request
     * @return Record
     */
    public function processPatch(RecordUpdateRequest $request): Record;

    /**
     * @param RecordDeleteRequest $request
     * @return Record
     */
    public function processDelete(RecordDeleteRequest $request): Record;

}
