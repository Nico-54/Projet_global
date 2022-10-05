<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actualites;

class ActualitesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= mt_rand(4, 6); $i++) {
            $actualites = new Actualites();

            $text = '<p>';
            $text .= implode('</p><p>', $faker->paragraphs(2));
            $text .= '</p>';

            $actualites->setTitre($faker->sentence(6, true))
                        ->setText($text)
                        ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                        ->setImage('https://picsum.photos/id/' . mt_rand(1, 200) . '/500/300');

            $manager->persist($actualites);
            $manager->flush();
        }
    }
}