<?php

namespace App\DataFixtures;

use App\Entity\Test;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($t = 0; $t < 10; $t++) {
            $test = new Test;
            $test->setNom($faker->userName)
                ->setPrenom($faker->userName);

            $manager->persist($test);
        }

        $manager->flush();
    }
}
