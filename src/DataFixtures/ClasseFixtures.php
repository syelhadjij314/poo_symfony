<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $niveaux = ["L1", "L2", "L3"];
        $filieres = ["Dev Web", "Dev Mobile", "Dev Web Mobile"];
        for ($i = 1; $i <= 10; $i++) 
        {
            $pos = rand(0, 2);
            $classe = new Classe();
            $classe->setNiveau($niveaux[$pos]);
            $classe->setFiliere($filieres[$pos]);
            $classe->setLibelle($niveaux[$pos] . " " . $filieres[$pos]);
            $manager->persist($classe);
            $this->addReference("Classe" . $i, $classe);
        }

        $manager->flush();
    }
}
