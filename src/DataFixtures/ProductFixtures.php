<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i <= 100; $i++) {
            $product = new Product();
            $product->setCode(mt_rand(1, 10));
            $product->setName("Name $i");
            $product->setType(['type-1', 'type-2', 'type-3'][array_rand(['type-1', 'type-2', 'type-3'])]);
            $product->setPrice(mt_rand(100 , 1000));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
