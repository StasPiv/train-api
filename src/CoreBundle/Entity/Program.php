<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 22.02.18
 * Time: 22:52
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityTrait;
use NorseDigital\Symfony\RestBundle\Entity\EnumInterface;
use NorseDigital\Symfony\RestBundle\Entity\EnumTrait;

/**
 * Class Program
 * @package CoreBundle\Entity
 */
class Program implements EnumInterface, EntityInterface
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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}