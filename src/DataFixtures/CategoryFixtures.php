<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CategoryFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $this->createCategory($manager, [
            'name' => 'NBA'
        ]);

        $this->createCategory($manager, [
            'name' => 'Basket féminin'
        ]);

        $this->createCategory($manager, [
            'name' => 'Basket Français'
        ]);

        $this->createCategory($manager, [
            'name' => 'Euroligue'
        ]);

        $manager->flush();

    }

    public function createCategory(ObjectManager $manager, array $data = [])
    {
        static $index = 0;

        $category = (new Category())
            ->setName($data['name']);

        $manager->persist($category);
        $this->setReference('user-' . $index++, $category);
    }
}
