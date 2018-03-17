<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\Record;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\RecordProcessorInterface;
use CoreBundle\Service\Record\RecordService;
use CoreBundle\Model\Request\Record\RecordListRequest;
use CoreBundle\Model\Request\Record\RecordCreateRequest;
use CoreBundle\Model\Request\Record\RecordReadRequest;
use CoreBundle\Model\Request\Record\RecordUpdateRequest;
use CoreBundle\Model\Request\Record\RecordDeleteRequest;


/**
 * Class RecordHandler
 */
class RecordHandler implements ContainerAwareInterface, RecordProcessorInterface
{
    use ContainerAwareTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var RecordService
     */
    private $recordService;

    /**
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param RecordService $recordService
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $eventDispatcher, RecordService $recordService)
    {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->recordService = $recordService;
    }

    /**
     * @param RecordListRequest $request
     * @return array
     */
    public function processGetC(RecordListRequest $request): array
    {
        $user = $this->container->get('core.service.user')->getCurrentUser();
        $criteria = ['user' => $user];

        if (!$request->getType()->isNull()) {
            $criteria['type'] = $request->getType();
        }

        return $this->recordService->getEntitiesByWithListRequestAndTotal($criteria, $request);
    }

    /**
     * @param RecordCreateRequest $request
     * @return Record
     */
    public function processPost(RecordCreateRequest $request): Record
    {
        return $this->recordService->updatePost($request);
    }

    /**
     * @param RecordReadRequest $request
     * @return Record
     */
    public function processGet(RecordReadRequest $request): Record
    {
        return $request->getRecord();
    }

    /**
     * @param RecordUpdateRequest $request
     * @return Record
     */
    public function processPut(RecordUpdateRequest $request): Record
    {
        return $this->recordService->updatePut($request);
    }

    /**
     * @param RecordUpdateRequest $request
     * @return Record
     */
    public function processPatch(RecordUpdateRequest $request): Record
    {
        return $this->recordService->updatePatch($request);
    }

    /**
     * @param RecordDeleteRequest $request
     * @return Record
     */
    public function processDelete(RecordDeleteRequest $request): Record
    {
        return $this->recordService->deleteEntity    ($request->getRecord());
    }

}
