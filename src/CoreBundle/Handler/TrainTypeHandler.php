<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\TrainType;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\TrainTypeProcessorInterface;
use CoreBundle\Service\TrainType\TrainTypeService;
use CoreBundle\Model\Request\TrainType\TrainTypeListRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeCreateRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeReadRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeUpdateRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeDeleteRequest;


/**
 * Class TrainTypeHandler
 */
class TrainTypeHandler implements ContainerAwareInterface, TrainTypeProcessorInterface
{
    use ContainerAwareTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var TrainTypeService
     */
    private $trainTypeService;

    /**
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     * @param TrainTypeService $trainTypeService
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $eventDispatcher, TrainTypeService $trainTypeService)
    {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
        $this->trainTypeService = $trainTypeService;
    }

    /**
     * @param TrainTypeListRequest $request
     * @return array
     */
    public function processGetC(TrainTypeListRequest $request): array
    {
        return $this->trainTypeService->getEntitiesByWithListRequestAndTotal([], $request);
    }

    /**
     * @param TrainTypeCreateRequest $request
     * @return TrainType
     */
    public function processPost(TrainTypeCreateRequest $request): TrainType
    {
        return $this->trainTypeService->updatePost($request);
    }

    /**
     * @param TrainTypeReadRequest $request
     * @return TrainType
     */
    public function processGet(TrainTypeReadRequest $request): TrainType
    {
        return $request->getTrainType();
    }

    /**
     * @param TrainTypeUpdateRequest $request
     * @return TrainType
     */
    public function processPut(TrainTypeUpdateRequest $request): TrainType
    {
        return $this->trainTypeService->updatePut($request);
    }

    /**
     * @param TrainTypeUpdateRequest $request
     * @return TrainType
     */
    public function processPatch(TrainTypeUpdateRequest $request): TrainType
    {
        return $this->trainTypeService->updatePatch($request);
    }

    /**
     * @param TrainTypeDeleteRequest $request
     * @return TrainType
     */
    public function processDelete(TrainTypeDeleteRequest $request): TrainType
    {
        return $this->trainTypeService->deleteEntity    ($request->getTrainType());
    }

}
