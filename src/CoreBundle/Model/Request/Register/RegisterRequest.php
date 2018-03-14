<?php

namespace CoreBundle\Model\Request\Register;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class RegisterRequest
 */
class RegisterRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RegisterRequest
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return RegisterRequest
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}
