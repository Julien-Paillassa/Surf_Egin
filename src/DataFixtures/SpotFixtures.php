<?php

namespace App\DataFixtures;

use App\Entity\Spot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpotFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $spot = new Spot();
        $spot->setName('Plage Nord');
        $spot->setCity('Le porge');
        $spot->setSpotType($this->setReference('spotType_0'));
        $manager->persist($spot);
        $this->addReference('spot_0', $spot);

        $spot = new Spot();
        $spot->setName('Plage centrale');
        $spot->setCity('Lacanau');
        $spot->setSpotType($this->setReference('spotType_1'));
        $manager->persist($spot);
        $this->addReference('spot_1', $spot);

        $spot = new Spot();
        $spot->setName('Les culs nus');
        $spot->setCity('Hossegor');
        $spot->setSpotType($this->setReference('spotType_0'));
        $manager->persist($spot);
        $this->addReference('spot_2', $spot);

        $spot = new Spot();
        $spot->setName('Le VVF');
        $spot->setCity('Anglet');
        $spot->setSpotType($this->setReference('spotType_2'));
        $manager->persist($spot);
        $this->addReference('spot_3', $spot);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SpotTypeFixtures::class,

        ];
    }
}
