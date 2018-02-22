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

/**
 * Class User
 * @package CoreBundle\Entity
 *
 * @ORM\Entity()
 */
class User implements EntityInterface
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
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    private $currentTrain;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    private $currentApproach;

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
}