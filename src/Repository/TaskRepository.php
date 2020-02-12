<?php

namespace App\Repository;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Task[]    findAll()
 * @method Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function getUserTasks($user_id,
                                 $searchOptions=['name', 'state', 'emergency_order']){
        $qb= $this->createQueryBuilder('t')
                 ->innerJoin('t.user', 'u')
                 ->where('u.id= :id')
                 ->setParameter('id', $user_id);

        if(isset($searchOptions['state'])){
            if(count($searchOptions['state'])>0){
                $qb->andWhere('t.state IN (:state)')
                    ->setParameter('state', $searchOptions['state']);
            }
        }
         if(isset($searchOptions['emergency_order']) && $searchOptions['emergency_order']){
             $qb->addOrderBy('t.deadline');
         }
        if(isset($searchOptions['name'])){
            $name=$searchOptions['name'].'%';
            $qb ->andWhere('t.title LIKE :name')
                ->setParameter('name', $name);
        }
         try{
             return $qb
                 ->getQuery()
                 ->getResult();
         }
         catch (NoResultException $e) {return [];}
    }
    public function getTaskById($id){
        return $this->createQueryBuilder('t')
                    ->where('t.id= :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getResult();
    }


}
