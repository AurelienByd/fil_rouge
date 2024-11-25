<?php

namespace App\DataFixtures;

use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $rubrique = new Rubrique();

        // $rubrique->setNomRubrique("Cuivres");

        // $manager->persist($rubrique);

        // $sousRubrique = new SousRubrique();

        // $sousRubrique->setNomSsRubrique("Trompettes");

        // $sousRubrique->setNomRubrique($rubrique);

        // $manager->persist($sousRubrique);

        $manager->flush();

    }
}
