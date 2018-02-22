<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class UserCreateRequest
 */
class UserCreateRequest extends AbstractRequest implements UserAllRequestInterface
{
    use UserAllRequestTrait;


}
