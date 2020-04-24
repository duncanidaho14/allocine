<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Realisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('Fr-fr');
        for ($i=1; $i <=30 ; $i++) { 
        
            $realisateur = new Realistaeur();

            $realisateur->setNom($faker->title)
                    ->setprenom($faker->imageUrl(640,480))
                    ->setDescription($faker->text)
                    ->setDuree($faker->time)
                    ->setDateSortie($faker->date)
                    ->setEtat(0)
                    ->setRealisateur($faker->randomDigitNotNull);
            $manager->persist($realisateur);
        }


        $manager->flush();
    }
}
