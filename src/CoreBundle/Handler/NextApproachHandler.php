<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\NextApproachProcessorInterface;
use CoreBundle\Model\Request\NextApproach\NextApproachRequest;


/**
 * Class NextApproachHandler
 */
class NextApproachHandler implements ContainerAwareInterface, NextApproachProcessorInterface
{
    use ContainerAwareTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $eventDispatcher)
    {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param NextApproachRequest $request
     * @return User
     */
    public function processPost(NextApproachRequest $request): User
    {
        $userService = $this->container->get('core.service.user');
        $user = $userService->getEntityBy(['name' => 'Stas']);

        $user->setCurrentApproach($user->getCurrentApproach() + 1);

        $userService->saveEntity($user);

        return $user;
    }

}
