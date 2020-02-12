<?php

namespace App\Repository;

use App\Entity\Project;
use App\Entity\Team;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    protected $registry;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
        $this->registry=$registry;
    }

    /**
     * @return Project[] Returns an array of Project objects
     * @throws \Doctrine\ORM\NonUniqueResultException
     */

    public function findById($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $team_id
     * @return Project|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findTeamProjects($team_id)
    {
        return $this->createQueryBuilder('p')
            ->select('p')
            ->leftJoin('p.team', 't')
            ->andWhere('t.id=:val')
            ->setParameter('val', $team_id)
            ->getQuery()
            ->getResult();
    }


}
