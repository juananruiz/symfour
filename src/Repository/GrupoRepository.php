<?php

namespace App\Repository;

use App\Entity\Grupo\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class GrupoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Grupo::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('g')
            ->where('g.something = :value')->setParameter('value', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
