<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 22.02.18
 * Time: 22:51
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;

/**
 * Class Record
 * @package CoreBundle\Entity
 *
 * @ORM\Entity()
 */
class Record implements EntityInterface
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
    protected $id;

    /**
     * @var TrainType
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\TrainType", cascade={"persist"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $type;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    private $trainNumber;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    private $approachNumber;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     *
     * @JMS\Expose()
     * @JMS\Type("float")
     */
    private $value;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     *
     * @JMS\Expose()
     * @JMS\Type("float")
     */
    private $weight = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $time;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return TrainType
     */
    public function getType(): TrainType
    {
        return $this->type;
    }

    /**
     * @param TrainType $type
     * @return Record
     */
    public function setType(TrainType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrainNumber(): int
    {
        return $this->trainNumber;
    }

    /**
     * @param int $trainNumber
     * @return Record
     */
    public function setTrainNumber(int $trainNumber): self
    {
        $this->trainNumber = $trainNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getApproachNumber(): int
    {
        return $this->approachNumber;
    }

    /**
     * @param int $approachNumber
     * @return Record
     */
    public function setApproachNumber(int $approachNumber): self
    {
        $this->approachNumber = $approachNumber;

        return $this;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Record
     */
    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     * @return Record
     */
    public function setTime(\DateTime $time): self
    {
        $this->time = $time;

        return $this;
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
     * @return Record
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return Record
     */
    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}