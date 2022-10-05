<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Evenements;

class EvenementsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= mt_rand(4, 6); $i++) {
            $evenements = new Evenements();

            $text = '<p>';
            $text .= implode('</p><p>', $faker->paragraphs(2));
            $text .= '</p>';

            $evenements->setTitre($faker->sentence(6, true))
                        ->setText($text)
                        ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                        ->setImage('https://picsum.photos/id/' . mt_rand(1, 200) . '/500/300');

            $manager->persist($evenements);
            $manager->flush();
        }
    }
}