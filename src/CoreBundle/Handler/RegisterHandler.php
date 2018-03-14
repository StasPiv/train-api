<?php

namespace CoreBundle\Handler;

use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\RegisterProcessorInterface;
use CoreBundle\Model\Request\Register\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class RegisterHandler
 */
class RegisterHandler implements ContainerAwareInterface, RegisterProcessorInterface
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
     * @param RegisterRequest $request
     * @return array
     */
    public function processPost(RegisterRequest $request): array
    {
        // some logic here
        $userService = $this->container->get('core.service.user');

        try {
            $user = $userService->getEntityBy(['name' => $request->getName()]);

            if ($user->getPassword() != sha1($request->getPassword())) {
                throw new \RuntimeException('Password mismatch', Response::HTTP_FORBIDDEN);
            }
        } catch (EntityNotFoundException $exception) {
            $user = $userService->createEntity();
            $user->setName($request->getName())
                ->setPassword(sha1($request->getPassword()));
            $userService->saveEntity($user);
        }

        $token = $this->container->get('lexik_jwt_authentication.jwt_manager')->create($user);

        return ['token' => $token];
    }

}
