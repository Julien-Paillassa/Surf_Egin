<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $brand = new Brand();
        $brand->setName('Nomads');
        $manager->persist($brand);
        $this->addReference('brand_0', $brand);

        $brand = new Brand();
        $brand->setName('Torq');
        $manager->persist($brand);
        $this->addReference('brand_1', $brand);

        $brand = new Brand();
        $brand->setName('Al Merrick');
        $manager->persist($brand);
        $this->addReference('brand_2', $brand);

        $brand = new Brand();
        $brand->setName('Bradley');
        $manager->persist($brand);
        $this->addReference('brand_3', $brand);

        $manager->flush();
    }
}
