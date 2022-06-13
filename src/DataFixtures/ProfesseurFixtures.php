<?php

namespace App\DataFixtures;

use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    /*     // $product = new Product();
        // $manager->persist($product);
        $grade=["MASTER","INGENIEUR","DOCTEUR"];
        for ($i = 0; $i < 10; $i++) {
            $pos = rand(0, 2);
            $prof = new Professeur();
            $prof->setNomComplet('prof' . $i);
            $prof->setGrade($grade[$pos]);;
            for ($j = 0; $j < 2; $j++) {
                
                $ref = rand(1, 10);
                $prof->addClass($this->getReference('Classe' . $ref));
            }
            $manager->persist($prof);
        }
 */
        $manager->flush();
    }
}
