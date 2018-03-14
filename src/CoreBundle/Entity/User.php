<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 22.02.18
 * Time: 23:36
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;

/**
 * Class User
 * @package CoreBundle\Entity
 *
 * @ORM\Entity()
 */
class User implements EntityInterface, JWTUserInterface
{
    use EntityTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Expose()
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @JMS\Expose()
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @JMS\Expose()
     * @JMS\Type("string")
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    private $currentTrain = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    private $currentApproach = 0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentTrain(): int
    {
        return $this->currentTrain;
    }

    /**
     * @param int $currentTrain
     * @return User
     */
    public function setCurrentTrain(int $currentTrain): self
    {
        $this->currentTrain = $currentTrain;

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentApproach(): int
    {
        return $this->currentApproach;
    }

    /**
     * @param int $currentApproach
     * @return User
     */
    public function setCurrentApproach(int $currentApproach): self
    {
        $this->currentApproach = $currentApproach;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return '';
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {

    }

    public static function createFromPayload($username, array $payload)
    {
        // TODO: Implement createFromPayload() method.
    }

    public function getUsername()
    {
        return $this->name;
    }
}