<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 22.02.18
 * Time: 22:38
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;
use NorseDigital\Symfony\RestBundle\Entity\EnumInterface;
use NorseDigital\Symfony\RestBundle\Entity\EnumTrait;

/**
 * Class TrainType
 * @package CoreBundle\Entity
 *
 * @ORM\Entity()
 */
class TrainType implements EnumInterface, EntityInterface
{
    use EnumTrait, EntityTrait;

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
    protected $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return TrainType
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}