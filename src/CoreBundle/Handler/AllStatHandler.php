<?php

namespace CoreBundle\Handler;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\AllStatProcessorInterface;
use CoreBundle\Model\Request\AllStat\AllStatRequest;


/**
 * Class AllStatHandler
 */
class AllStatHandler implements ContainerAwareInterface, AllStatProcessorInterface
{
    use ContainerAwareTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $eventDispatcher)
    {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param AllStatRequest $request
     * @return array
     */
    public function processGet(AllStatRequest $request): array
    {
        $currentUser = $this->container->get('core.service.user')->getCurrentUser();

        $sql = <<<'SQL'
SELECT tt.title, DATE(NOW()) - DATE(time)  interv, MAX(`value`) `maxValue`, MAX(weight) `maxWeight`, MIN(`value`) `minValue`, MAX(weight) `minWeight`,
  ROUND(AVG(`value`),2) `avgValue`, ROUND(AVG(weight),2) `avgWeight` FROM record r
  JOIN train_type tt ON tt.id = r.type_id
  JOIN user u ON u.id = r.user_id
  WHERE u.id = %current_user%
  GROUP BY u.name, tt.title, interv
ORDER BY interv ASC
SQL;
        $sql = str_replace('%current_user%', $currentUser->getId(), $sql);
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute([]);

        $result['last'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $sql = <<<'SQL'
SELECT tt.title, MAX(`value`) `maxValue`, MAX(weight) `maxWeight`, MIN(`value`) `minValue`, MAX(weight) `minWeight`,
  ROUND(AVG(`value`),2) `avgValue`, ROUND(AVG(weight),2) `avgWeight` FROM record r
  JOIN train_type tt ON tt.id = r.type_id
  JOIN user u ON u.id = r.user_id
  WHERE u.id = %current_user%
  GROUP BY tt.title
SQL;
        $sql = str_replace('%current_user%', $currentUser->getId(), $sql);
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute([]);

        $result['records'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

}
