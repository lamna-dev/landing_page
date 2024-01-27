<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public const CATEGORY = 'CATEGORY';
    private const CATEGORIES = ['Commerce local', 'Astuce voyage', 'Transport', 'Le projet'];

    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < count(self::CATEGORIES); $i++) { 
            $category = $this->createCategory($i);
            $manager->persist($category);
        }
        
        $manager->flush();
    }   

    private function createCategory($i) 
    {
        $category = new Categories();
        $category->setName(self::CATEGORIES[$i]);
        $category->setCreatedAt(new \DateTimeImmutable());
        $category->setUpdatedAt(new \DateTime());
        $this->addReference(self::CATEGORY.'_'.$i, $category); 
        return $category;
    }
}