<?php

namespace CoreBundle\Service\User;

use CoreBundle\Entity\User;
use NorseDigital\Symfony\RestBundle\Exception\Request\BadRequestException;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Model\Request\User\UserAllRequestInterface;
use CoreBundle\Model\Request\User\UserCreateRequest;
use CoreBundle\Model\Request\User\UserUpdateRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationExpiredException;


/**
 * Class UserService
 *
 * @method User createEntity()
 * @method User getEntity(int $id)
 * @method User getEntityBy(array $criteria)
 * @method User deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class UserService extends AbstractService implements EventSubscriberInterface, UserDefaultValuesInterface
{
    use UserDefaultValuesTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(ContainerInterface $container, string $entityClass, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [];
    }

    /**
     * @param UserCreateRequest $request
     * @return User
     */
    public function updatePost(UserCreateRequest $request): User
    {
        $user = $this->createEntity();
        $this->setGeneralFields($request, $user, true);
        $this->saveEntity($user);
        return $user;
    }

    /**
     * @param UserUpdateRequest $request
     * @return User
     */
    public function updatePut(UserUpdateRequest $request): User
    {
        $user = $request->getUser();
        $this->setGeneralFields($request, $user, true);
        $this->saveEntity($user);
        return $user;
    }

    /**
     * @param UserUpdateRequest $request
     * @return User
     */
    public function updatePatch(UserUpdateRequest $request): User
    {
        $user = $request->getUser();
        $this->setGeneralFields($request, $user);
        $this->saveEntity($user);
        return $user;
    }

    /**
     * @param UserAllRequestInterface $request
     * @param User $user
     * @param bool $fullUpdate
     * @return User
     */
    public function setGeneralFields(UserAllRequestInterface $request, User $user, bool $fullUpdate = false): User
    {
    if ($request->hasName()) {
            $user->setName($request->getName());
        } elseif ($fullUpdate) {
            $user->setName($this->getDefaultName());
        }
    
        if ($request->hasCurrentTrain()) {
            $user->setCurrentTrain($request->getCurrentTrain());
        } elseif ($fullUpdate) {
            $user->setCurrentTrain($this->getDefaultCurrentTrain());
        }
    
        if ($request->hasCurrentApproach()) {
            $user->setCurrentApproach($request->getCurrentApproach());
        } elseif ($fullUpdate) {
            $user->setCurrentApproach($this->getDefaultCurrentApproach());
        }
        return $user;
    }

    /**
     * @return User
     */
    public function getCurrentUser(): User
    {
        $tokenStorage = $this->container->get('security.token_storage');

        $token = $tokenStorage->getToken();

        if ($token instanceof TokenInterface) {
            if (!$token->getUser() instanceof User) {
                throw new \RuntimeException('For some reason user is: ' . $token->getUser(), Response::HTTP_FORBIDDEN);
            }
            return $token->getUser();
        }

        throw new BadRequestException(
            'Current user not authenticated.',
            404,
            new AuthenticationExpiredException(),
            ['current_user' => 'not authenticated.']
        );
    }

}
