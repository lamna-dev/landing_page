<?php

namespace App\Repository;

use App\Entity\Paragraphs;
use App\Entity\Posts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Paragraphs>
 *
 * @method Paragraphs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paragraphs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paragraphs[]    findAll()
 * @method Paragraphs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParagraphsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paragraphs::class);
    }

    public function findAllParagraphsOfPost(Posts $post) 
    {
        return $this->createQueryBuilder('pa')
            ->select('pa')
            ->andWhere('pa.post = :postId')
            ->setParameter('postId', $post->getId())
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Paragraphs[] Returns an array of Paragraphs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Paragraphs
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
