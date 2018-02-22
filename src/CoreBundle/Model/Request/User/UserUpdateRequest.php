<?php

namespace CoreBundle\Model\Request\User;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class UserUpdateRequest
 *
 * @method bool hasName()
 * @method bool hasCurrentTrain()
 * @method bool hasCurrentApproach()
 */
class UserUpdateRequest extends AbstractRequest implements UserSingleRequestInterface, UserAllRequestInterface
{
    use UserSingleRequestTrait {
        UserSingleRequestTrait::__construct as constructTraitUserSingleType;
    }
    use UserAllRequestTrait {
        UserAllRequestTrait::__construct as constructTraitUserAllType;
    }


    /**
     * @inheritDoc
     */
    public function __construct()
    {
    $this->constructTraitUserSingleType();
    $this->constructTraitUserAllType();
    }

}
