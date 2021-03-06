<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestTrait;
use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class UserListRequest
 */
class UserListRequest extends AbstractRequest implements ListRequestInterface
{
    use ListRequestTrait;


}
