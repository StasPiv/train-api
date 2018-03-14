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
        $sql = <<<'SQL'
SELECT tt.title, ROUND(AVG(value),2) avg, MAX(value) max FROM record
              JOIN train_type tt ON tt.id = record.type_id
            WHERE DATE(time) > DATE(NOW() - INTERVAL 30 DAY)
            GROUP BY type_id;
SQL;
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute([]);


        $result['30days'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $sql = <<<'SQL'
SELECT tt.title, ROUND(AVG(value),2) avg, MAX(value) max FROM record
              JOIN train_type tt ON tt.id = record.type_id
            WHERE DATE(time) > DATE(NOW() - INTERVAL 7 DAY)
            GROUP BY type_id;
SQL;
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute([]);


        $result['7days'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $sql = <<<'SQL'
SELECT tt.title, ROUND(AVG(value),2) avg, MAX(value) max FROM record
              JOIN train_type tt ON tt.id = record.type_id
            WHERE DATE(time) = DATE(NOW() - INTERVAL 1 DAY)
            GROUP BY type_id;
SQL;
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute([]);


        $result['yesterday'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $sql = <<<'SQL'
SELECT tt.title, ROUND(AVG(value),2) avg, MAX(value) max FROM record
              JOIN train_type tt ON tt.id = record.type_id
            WHERE DATE(time) = DATE(NOW() - INTERVAL 0 DAY)
            GROUP BY type_id;
SQL;
        /** @var EntityManager $em */
        $em = $this->container->get('doctrine')->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute([]);


        $result['today'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

}
